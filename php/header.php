<div id="header">
  <div class="nav">
    <div class="container">
      <a href="./" class="logo">轻惋壁纸</a>
      <form class="search" method="GET">
        <input name="type" style="display:none;" value="search">
        <input type="search" placeholder="搜索番名Σ(ﾟдﾟ;)" name="s" class="search-input" value="<?php echo $_GET["s"]; ?>">
        <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
      </form>
      <div class="user">
      <?php
        $type = $_GET["type"];
      if (isset($_COOKIE["qq"])){//如果已经登录
        include("config.php");
        $idbname = "user";
        // 创建链接
        $iconn = new mysqli($chainwon['mysql'], $chainwon['mysqlname'], $chainwon['mysqlpassword'], $idbname);
        $isql = "SELECT * FROM user where name='".$_COOKIE["name"]."'";
        $iresult = $iconn->query($isql);
        $irow = $iresult->fetch_assoc();
        echo '<div class="user-right">';
        echo '<img class="user-avatar" src="https://q1.qlogo.cn/g?b=qq&nk='.$_COOKIE["qq"].'&s=100">';
        echo '</div>';
        echo '<div class="user-information">';
        echo '<div class="text">';
        echo '<p class="name">'.$_COOKIE["name"].'</p>';
        echo '</div>';
        echo '<div class="tool">';
        echo '<a href="http://www.chainwon.com/user.php?uid='.$_COOKIE["uid"].'" class="piece"><i class="fa fa-home"></i></a>';
        echo '<a href="http://www.chainwon.com/user/setting.php" class="piece"><i class="fa fa-cog"></i></a>';
        echo '<a href="http://www.chainwon.com/logout.php" class="piece"><i class="fa fa-power-off"></i></a>';
        echo '</div>';
        echo '</div>'."\n";
      }else{//否则
        echo '<a href="http://www.chainwon.com/login.php">注册/登陆</a>';
      }
      ?>
      </div>
      <a rel="nofollow" href="//bizhi.chainwon.com/?type=upload" class="upload">投稿</a>
    </div>
  </div>
  <a href="https://v3.chainwon.com/" target="_blank"><div class="background"></div></a>
  <div class="bottom">
    <div class="container">
      <nav class="bottom-header">
        <a href="/" <?php if($row["type"] != "景物" && $row["type"] != "人物" && $type != "view" && $type != "people" && $type != "search" && $type != "upload"){echo 'class="active"';} ?>>首页</a>
        <a href="/?type=view" <?php if($type == "view" || $row["type"] == "景物"){echo 'class="active"';} ?>>景物</a>
        <a href="/?type=people" <?php if($type == "people" || $row["type"] == "人物"){echo 'class="active"';} ?>>人物</a>
      </nav>
    </div>
  </div>
</div>
