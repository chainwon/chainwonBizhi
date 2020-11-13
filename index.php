<?php
error_reporting(0);
$vn = $_GET["vn"];
$pn = $_GET["pn"];
$i = $_GET["i"];
$page = $_GET["page"];
$type = $_GET["type"];
if(mb_strwidth($vn) >0){
  include "./php/vn.php";
}elseif(mb_strwidth($pn) >0){
  include "./php/pn.php";
}elseif(mb_strwidth($i) >0){
  include "./php/i.php";
}elseif($type == 'upload'){
  include "./php/upload.php";
}elseif($type == 'people'){
  include "./php/people.php";
}elseif($type == 'view'){
  include "./php/view.php";
}elseif($type == 'search'){
  include "./php/search.php";
}else{
  include "./php/home.php";
}
?>
