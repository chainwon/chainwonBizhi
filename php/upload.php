<!DOCTYPE HTML>
<html>

<head>
	<title>轻惋壁纸 - 用双手投稿美好世界！</title>
	<?php include "./php/head.php"; ?>
</head>

<body>
	<!-- Main -->
	<?php
	include "./php/header.php";
  ?>
		<div id="content">
			<div class="container">
				<form action="?type=upload" onsubmit="return Checkform();" method="post" enctype="multipart/form-data">
					<div class="upload-input">
					  <input type="file" class="fileinput" name="file" onchange='PreviewImage(this)'>
						<div class="round-1 fa fa-upload"></div>
						<div class="round-2"></div>
					  <div class="round-3"></div>
					  <div class="round-4"></div>
					  <div class="round-5"></div>
				  </div>
					<div id="imgPreview">

					</div>
				</form>
			</div>
		</div>
		<?php
			if(isset($_REQUEST['uploadok'])){
				$allowedExts = array("jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);     // 获取文件后缀名
				if ((
				$_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/png")
				&& ($_FILES["file"]["size"] < 2097152)   // 小于 2MB
				&& in_array($extension, $allowedExts)
				){
					if ($_FILES["file"]["error"] > 0){
						echo "错误：: " . $_FILES["file"]["error"];
						}else{
						$name = date("Ymdhis").rand(10000,99999);
							if($irow["sign"] == '是'){
								move_uploaded_file($_FILES["file"]["tmp_name"], "bd/" . $name.'.jpg');
								header('Content-type:  image/jpeg');
								$filename =  "bd/" . $name.'.jpg';
								list($width_orig, $height_orig) =  getimagesize($filename);
								$image_p =  imagecreatetruecolor(440, 250);
								$image =  imagecreatefromjpeg($filename);
								imagecopyresampled($image_p, $image, 0, 0,  0, 0, 444, 250, $width_orig, $height_orig);
								imagejpeg($image_p,"shrink/".$name.'.jpg', 90);
								$uploadconn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], 'bizhi.chainwon.com');
								$stmt = $uploadconn->prepare("INSERT INTO i (imgurl, imgurlindex, introduce, source, date, type, url, uid, author, label, width, height, qq) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
								$stmt->bind_param("sssssssssssss", $imgurl, $imgurlindex, $introduce, $source, $date, $type, $url, $uid, $author, $label, $width_orig, $height_orig, $qq);
								$imgurl = "/bd/" . $name.'.jpg';
								$imgurlindex = "/shrink/" . $name.'.jpg';
								$introduce = $_POST['up-introduce'];
								$source = $_POST['up-source'];
								$date = date('Y-m-d H:i:s');
								$type = $_POST['up-type'];
								$url = '?/i='.$name;
								$uid = $_COOKIE["uid"];
								$author = $_POST['up-author'];
								$label = $_POST['up-label'];
								$qq = $_COOKIE["qq"];
								$stmt->execute();
								$stmt->close();
								header("Refresh:0;url=./?type=upload");
						}
					}
				}
			}
		?>
		<div id="footer">
			<?php include "./php/footer.php"; ?>
			<script src="./assets/js/upload.js?v=3.4"></script>
			<script>
			<?php if (isset($_COOKIE["qq"])){}else{
				echo 'swal({title: "",text: "请登录后进行投稿！",type: "error",closeOnConfirm: false,confirmButtonText: "我明白了",confirmButtonColor: "#ec6c62"}, function() {window.location.href="http://www.chainwon.com/login.php";});';
			} ?>
			</script>
		</div>
		</div>
</body>

</html>
