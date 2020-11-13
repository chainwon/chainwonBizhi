<!DOCTYPE html>
<html>

<head>
  <title>轻惋壁纸 - 用双手创造美好世界！</title>
  <?php include "./php/head.php"; ?>
</head>

<body>
  <?php
	include "./php/header.php";
	$servername = "localhost";
	$username = "root";
	$password = "Lzj021272333";
	$dbname = "bizhi.chainwon.com";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$bsql = "SELECT * FROM i WHERE type='景物' ORDER BY id DESC limit 0,12";
	$bresult = $conn->query($bsql);
  $psql = "SELECT * FROM i WHERE type='人物' ORDER BY id DESC limit 0,12";
	$presult = $conn->query($psql);
  $asql = "SELECT * FROM i ORDER BY id DESC limit 0,4";
	$aresult = $conn->query($asql);
	?>
  <div id="content">
    <div class="container">
      <div class="show">
        <ul class="slider-bar">
          <li bar="bar" class="on"></li>
          <li bar="bar" class=""></li>
          <li bar="bar" class=""></li>
          <li bar="bar" class=""></li>
          <li bar="bar" class=""></li>
        </ul>
        <div class="show-area">
          <a href="//bizhi.chainwon.com/wallpaper_705.html" target="_blank"><img src="https://ws2.sinaimg.cn/large/a15b4afegw1f9oo5u3r7mj21hc0w0drj.jpg" width="100%" height="100%" alt="喜庆《你的名字》12月02日大陆上映！"></a>
          <div class="message">
            喜庆《你的名字》12月02日大陆上映！
          </div>
        </div>
      </div>
      <div class="user">
        <?php
  			if ($aresult->num_rows > 0) {
  					// 输出每行数据
  					while($arow = $aresult->fetch_assoc()) {
                echo '<a href="//bizhi.chainwon.com/wallpaper_'.$arow["id"].'.html" target="_blank">';
  							echo '<div class="user-area">';
                echo '<div class="if">'.$arow["introduce"].'</div>';
                echo '<div class="av"><img src="//q1.qlogo.cn/g?b=qq&nk='.$arow["qq"].'&s=100" width="100%" height="100%" alt="'.$arow["introduce"].'"></div>';
                  echo '<div class="bg"><img src="//bizhi.chainwon.com'.$arow["imgurlindex"].'" width="100%" height="100%" alt="'.$arow["source"].'"></div>';
  							echo '</div>';
                echo '</a>'."\n";
  					}
  			}
  			?>
      </div>
      <div class="area">
        <div class="area-title">
          <i class="icon fa fa-paper-plane" style="background:rgb(79, 198, 236);"></i> 人物最新 <a class="more">更多</a>
        </div>
        <?php
  			if ($presult->num_rows > 0) {
  					// 输出每行数据
  					while($prow = $presult->fetch_assoc()) {
  							echo '<li>';
  							echo '<img src="//bizhi.chainwon.com'.$prow["imgurlindex"].'" width="100%" height="100%" alt="'.$prow["source"].'">';
                echo '<a href="//bizhi.chainwon.com/wallpaper_'.$prow["id"].'.html" target="_blank">';
  							echo '<div class="info">';
                echo '<img src="//bizhi.chainwon.com'.$prow["imgurlindex"].'" width="100%" height="100%" alt="'.$prow["source"].'">';
                echo '<div class="info-text">';
                echo '<div class="info-text-av">';
                echo '<img src="//q1.qlogo.cn/g?b=qq&nk='.$prow["qq"].'&s=100" width="100%" height="100%" alt="'.$prow["introduce"].'">';
                echo '</div>';
                echo '<div class="info-text-p">';
                echo '<p><i class="fa fa-eye"></i> 浏览：'.$prow["view"].'</p>';
                echo '<p><i class="fa fa-star"></i> 出自：'.$prow["source"].'</p>';
                echo '<p><i class="fa fa-clock-o"></i> 时间：'.$prow["date"].'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
  							echo '</li>'."\n";
  					}
  			}
  			?>
      </div>
      <div class="area">
        <div class="area-title">
          <i class="icon fa fa-photo" style="background:rgb(247, 108, 108);"></i> 景物最新 <a class="more">更多</a>
        </div>
        <?php
  			if ($bresult->num_rows > 0) {
  					// 输出每行数据
  					while($brow = $bresult->fetch_assoc()) {
  							echo '<li>';
  							echo '<img src="//bizhi.chainwon.com'.$brow["imgurlindex"].'" width="100%" height="100%" alt="'.$brow["source"].'">';
                echo '<a href="//bizhi.chainwon.com/wallpaper_'.$brow["id"].'.html" target="_blank">';
  							echo '<div class="info">';
                echo '<img src="//bizhi.chainwon.com'.$brow["imgurlindex"].'" width="100%" height="100%" alt="'.$brow["source"].'">';
                echo '<div class="info-text">';
                echo '<div class="info-text-av">';
                echo '<img src="//q1.qlogo.cn/g?b=qq&nk='.$brow["qq"].'&s=100" width="100%" height="100%" alt="'.$brow["introduce"].'">';
                echo '</div>';
                echo '<div class="info-text-p">';
                echo '<p><i class="fa fa-eye"></i> 浏览：'.$brow["view"].'</p>';
                echo '<p><i class="fa fa-star"></i> 出自：'.$brow["source"].'</p>';
                echo '<p><i class="fa fa-clock-o"></i> 时间：'.$brow["date"].'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
  							echo '</li>'."\n";
  					}
  			}
  			?>
      </div>
    </div>
  </div>
  <div id="footer">
    <?php include "./php/footer.php"; ?>
  </div>
</body>

</html>
