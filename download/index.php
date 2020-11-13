<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "Lzj021272333";
$dbname = "bizhi.chainwon.com";
$con = mysqli_connect($servername, $username, $password, $dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
$nowi = $_GET["i"];
$sql = "SELECT * FROM i where id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $filelink = 'https://bizhi.chainwon.com'.$row["imgurl"];
  $name = $row["source"].'的高清壁纸.jpg';
  $filesize = strlen(file_get_contents($filelink));
}
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=".$name);
header('content-length:'.$filesize);
readfile($filelink);
?>
