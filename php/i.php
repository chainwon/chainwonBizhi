<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "Lzj021272333";
$dbname = "bizhi.chainwon.com";
$con = mysqli_connect($servername, $username, $password, $dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
$nowi = $_GET["i"];
$sql = "SELECT * FROM i where id=$nowi";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nowuser = $row["uid"];
  $udbname = "user";
  $uconn = new mysqli($servername, $username, $password, $udbname);
  $usql = "SELECT * FROM user where uid='".$nowuser."'";
  $uresult = $uconn->query($usql);
  $urow = $uresult->fetch_assoc();
  $nowview = $row["view"] + 1;
  $nowid = $row["id"];
  mysqli_query($con,"UPDATE i SET view='".$nowview."' WHERE id='".$nowid."'");
}else{
  header('Location: //bizhi.chainwon.com/404.php');
}
$urls = array(
    'http://bizhi.chainwon.com/wallpaper_'.$nowid.'.html',
);
$api = 'http://data.zz.baidu.com/urls?site=bizhi.chainwon.com&token=7q4YIgtzCuMdGNce';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result2 = curl_exec($ch);
?>
<head>
  <title><?php echo $row["source"] ?>的高清1080P壁纸 - 轻惋壁纸</title>
  <meta charset="utf-8">
  <meta name="description" content="一个轻盈的二次元动漫壁纸网站~">
  <meta name="keywords" content="<?php echo $row["author"].','.$row["source"].','.$row["label"]; ?>,轻惋壁纸,壁纸,二次元壁纸,宅壁纸,萌壁纸,动漫壁纸">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="./favicon.ico">
  <link href="./assets/css/main.css?v=6.3.5" rel="stylesheet">
  <link href="./assets/css/main-other.css?v=1.8.1" rel="stylesheet">
  <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <link href="//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
  <link href="./assets/css/duoshuo.css?v=1.4" rel="stylesheet">
</head>

<body>
  <?php
	include "./php/header.php";
	?>
  <div id="content">
    <div class="container">
      <div class="i">
        <div class="photo">
          <img src="//bizhi.chainwon.com<?php echo $row["imgurl"];?>">
          <div class="m">
          </div>
        </div>
        <div class="author">
          <div class="pic" style="background-image:url(//bizhi.chainwon.com<?php echo $row["imgurl"];?>);"></div>
          <div class="aie">
            <a href="http://www.chainwon.com/user.php?uid=<?php echo $urow["uid"];?>" target="_blank">
            <img src="//q1.qlogo.cn/g?b=qq&nk=<?php echo $urow["qq"];?>&s=100">
            </a>
            <div class="im">
              <p class="name"><?php echo $urow["name"]; ?></p>
              <p class="write"><?php echo $row["introduce"];?></p>
            </div>
          </div>
        </div>
        <div class="tool">
          <div class="goodgame">

          </div>
          <div class="share">
            <a href="http://connect.qq.com/widget/shareqq/index.html?url=http://bizhi.chainwon.com/wallpaper_<?php echo $row["id"]; ?>.html&desc=<?php echo $row["source"] ?>的高清1080P壁纸 - 轻惋壁纸&pics=http://bizhi.chainwon.com<?php echo $row["imgurlindex"]; ?>&site=qqcom" target="_blank" class="fa fa-qq"></a>
            <a href="http://service.weibo.com/share/share.php?title=<?php echo $row["source"] ?>的高清1080P壁纸 - 轻惋壁纸&url=http://bizhi.chainwon.com/wallpaper_<?php echo $row["id"]; ?>.html&pic=http://bizhi.chainwon.com<?php echo $row["imgurlindex"]; ?>" target="_blank" class="fa fa-weibo"></a>
            <a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http://bizhi.chainwon.com/wallpaper_<?php echo $row["id"]; ?>.html&title=<?php echo $row["source"] ?>的高清1080P壁纸 - 轻惋壁纸&pics=http://bizhi.chainwon.com<?php echo $row["imgurlindex"]; ?>" target="_blank" class="fa fa-star"></a>
            <a href="" target="_blank" class="fa fa-renren"></a>
            <a href="http://www.halihali.tv/e/search/result/?searchid=10" target="_blank" class="fa fa-play-circle-o"></a>
            <a href="//bizhi.chainwon.com/download/?id=<?php echo $row["id"];?>" class="fa fa-download"> 下载壁纸</a>
          </div>
        </div>
        <div class="label">
          <a class="fa fa-copyright"> <?php echo $row["author"]; ?></a>
          <a class="fa fa-bookmark"> <?php echo $row["source"]; ?></a>
          <a class="fa fa-eye"> <?php echo $row["view"]; ?>次浏览</a>
          <a class="fa fa-clock-o"> <?php echo substr($row["date"],0,10); ?></a>
          <?php
          if($row["width"] != ''){
            echo '<a class="fa fa-file-image-o"> '.$row["width"].'×'.$row["height"].'</a>'."\n";
          }
          $arr = explode(',',$row["label"]);
          $x = 0;
          while($arr[$x] != '') {
            echo '<a class="fa fa-tags"> '.$arr[$x].'</a>'."\n";
            $x++;
          }
          ?>
        </div>
        <div class="ds-thread" data-thread-key="id<?php echo $row["id"]; ?>" data-title="<?php echo $row["source"] ?>的高清1080P壁纸 - 轻惋壁纸" data-url="//bizhi.chainwon.com/wallpaper_<?php echo $row["id"]; ?>.html"></div>
      </div>
    </div>
  </div>
  <div id="footer">
    <?php include "./php/footer.php"; ?>
    <script type="text/javascript">
        var duoshuoQuery = {
            short_name: "chainwonbizhi"
        };
        (function() {
            var ds = document.createElement('script');
            ds.type = 'text/javascript';
            ds.async = true;
            ds.src = './assets/js/embed.js';
            ds.charset = 'UTF-8';
            (document.getElementsByTagName('head')[0] ||
                document.getElementsByTagName('body')[0]).appendChild(ds);
        })();
    </script>
    <script type="text/javascript" src="./assets/js/kaomoji.js"></script>
    <script type="text/javascript" src="./assets/js/more.js?v=1.5"></script>
  </div>
</body>

</html>
