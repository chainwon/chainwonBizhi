<!DOCTYPE HTML>
<html>

<head>
	<title>轻惋壁纸 - 景物壁纸</title>
	<?php include "./php/head.php"; ?>
</head>

<body>
	<!-- Main -->
	<?php
	include "./php/header.php";
	$servername = "localhost";
	$username = "root";
	$password = "Lzj021272333";
	$dbname = "bizhi.chainwon.com";
	$conn = new mysqli($servername, $username, $password, $dbname);
  $p = $_GET["p"];
	if($p == ''){
		$p = 1;
	}

	$con=mysqli_connect("localhost","root","Lzj021272333","bizhi.chainwon.com");
	$cha3="SELECT * FROM i where type='景物'";
	$cha_result3=mysqli_query($con,$cha3);
	$allpic=mysqli_num_rows($cha_result3);
	$allpage=	ceil($allpic/18);

	$view = 18*$p-18;
	$sql = "SELECT * FROM i where type='景物' ORDER BY id DESC limit $view,18";
	$result = $conn->query($sql);
	?>
	<div id="content">
    <div class="container">
			<div class="area">
				<?php
				if ($result->num_rows > 0) {
						// 输出每行数据
						while($row = $result->fetch_assoc()) {
								echo '<li>';
								echo '<img src="//bizhi.chainwon.com'.$row["imgurlindex"].'" width="100%" height="100%" alt="'.$row["source"].'">';
								echo '<a href="//bizhi.chainwon.com/wallpaper_'.$row["id"].'.html" target="_blank">';
								echo '<div class="info">';
								echo '<img src="//bizhi.chainwon.com'.$row["imgurlindex"].'" width="100%" height="100%" alt="'.$row["source"].'">';
								echo '<div class="info-text">';
								echo '<div class="info-text-av">';
								echo '<img src="//q1.qlogo.cn/g?b=qq&nk='.$row["qq"].'&s=100" width="100%" height="100%" alt="'.$row["introduce"].'">';
								echo '</div>';
								echo '<div class="info-text-p">';
								echo '<p><i class="fa fa-eye"></i> 浏览：'.$row["view"].'</p>';
								echo '<p><i class="fa fa-star"></i> 出自：'.$row["source"].'</p>';
								echo '<p><i class="fa fa-clock-o"></i> 时间：'.$row["date"].'</p>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '</a>';
								echo '</li>'."\n";
						}
				}
				?>
			</div>
			<div class="page">
				<a href="./?type=view&p=<?php
				if($p == 1){
					$lastpage = $allpage;
				}else{
					$lastpage = $p -1;
				}
				echo $lastpage;
				?>">上一页</a>
				<?php
				$page_2 = $p-2;
				$page_1 = $p-1;
				$page_3 = $p+1;
				$page_4 = $p+2;
				$page_rest = $allpage - $p;
				if($p > 2){
					echo '<a href="./?type=view&p='.$page_2.'">'.$page_2.'</a>'."\n";
				}
				if($p > 1){
					echo '<a href="./?type=view&p='.$page_1.'">'.$page_1.'</a>'."\n";
				}
				?>
				<a class="active nowpage"><?php echo $p; ?></a>
				<?php
				if($page_rest > 0){
					echo '<a href="./?type=view&p='.$page_3.'">'.$page_3.'</a>'."\n";
				}
			  if($page_rest > 1){
					echo '<a href="./?type=view&p='.$page_4.'">'.$page_4.'</a>'."\n";
				}
				?>
				<a href="./?type=view&p=<?php
				if($p == $allpage){
					$nextpage = 1;
				}else{
					$nextpage = $p +1;
				}
				echo $nextpage;
				?>">下一页</a>
			</div>
  	</div>
	</div>
	<div id="footer">
    <?php include "./php/footer.php"; ?>
		<script>
		$(".nowpage").click(function() {
			swal({
				title: "",
				text: "<div class='allpages'><?php $allpages=1;$allpage1=$allpage+1;while($allpages < $allpage1){echo "<a href='./?type=view&p=".$allpages."'>".$allpages."</a>";$allpages++;} ?></div>",
				html: true,
				type: null,
				animation: "slide-from-top",
				showCancelButton: true,
			});
		});
		</script>
  </div>
</body>
</html>
