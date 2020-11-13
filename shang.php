<html>
<head>
<meta charset="utf-8">
</head>
<body>

<form action="shang.php" method="post" enctype="multipart/form-data">
	<label for="file">文件名：</label>
	<input type="file" name="file" id="file">
  <input type="submit" name="submit" value="提交">
</form>

</body>
</html>
<div class="uploadok"><i class="fa fa-check"></i></div>
<div class="already">
	<?php
	if(isset($_REQUEST['submit'])){
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
				echo "错误：: " . $_FILES["file"]["error"] . "<br>";
			}else{
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . date("Ymdhis").'.jpg');
				echo '<div class="alreadyimg">';
				echo '<img src="upload/'.date("Ymdhis").'.jpg">';
				echo '</div>';
				$img = getimagesize('upload/'.date("Ymdhis").'.jpg');
				echo $img[0],"<br />";
				echo $img[1];
			}
		}else{
			echo "请上传以JPG或PNG格式结尾的图片";
		}
	}
	?>
</div>
