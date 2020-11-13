<?php
   $servername = "localhost";
   $username = "root";
   $password = "Lzj021272333";
   $dbname = "bizhi.chainwon.com";
   $conn = new mysqli($servername, $username, $password, $dbname);

   $asql = "SELECT * FROM i ORDER BY RAND()";
   $aresult = $conn->query($asql);
   $arow = $aresult->fetch_assoc();

   $psql = "SELECT * FROM i WHERE type='人物' ORDER BY RAND()";
   $presult = $conn->query($psql);
   $prow = $presult->fetch_assoc();

   $vsql = "SELECT * FROM i WHERE type='景物' ORDER BY RAND()";
   $vresult = $conn->query($vsql);
   $vrow = $vresult->fetch_assoc();

   $aid = $arow["id"];
   $asource = $arow["source"];
   $atype = $arow["type"];
   $aurl = 'http://bizhi.chainwon.com'.$arow["url"];
   $abd = 'http://bizhi.chainwon.com'.$arow["imgurl"];
   $ashrink = 'http://bizhi.chainwon.com'.$arow["imgurlindex"];
   $adata = $arow["date"];

   $pid = $prow["id"];
   $psource = $prow["source"];
   $ptype = $prow["type"];
   $purl = 'http://bizhi.chainwon.com'.$prow["url"];
   $pbd = 'http://bizhi.chainwon.com'.$prow["imgurl"];
   $pshrink = 'http://bizhi.chainwon.com'.$prow["imgurlindex"];
   $pdata = $prow["date"];

   $vid = $vrow["id"];
   $vsource = $vrow["source"];
   $vtype = $vrow["type"];
   $vurl = 'http://bizhi.chainwon.com'.$vrow["url"];
   $vbd = 'http://bizhi.chainwon.com'.$vrow["imgurl"];
   $vshrink = 'http://bizhi.chainwon.com'.$vrow["imgurlindex"];
   $vdata = $vrow["date"];

   copy($abd,'./bizhi.png');
   copy($ashrink,'./bizhi-s.png');
   copy($pbd,'./people.png');
   copy($pshrink,'./people-s.png');
   copy($vbd,'./view.png');
   copy($vshrink,'./view-s.png');


   $arr = array(
       'id' => $aid,
       'source' => $asource,
       'type' => $atype,
       'url' => $aurl,
       'bd' => $abd,
       'shrink' => $ashrink,
       'date' => $adata,

       'pid' => $pid,
       'psource' => $psource,
       'ptype' => $ptype,
       'purl' => $purl,
       'pbd' => $pbd,
       'pshrink' => $pshrink,
       'pdate' => $pdata,

       'vid' => $vid,
       'vsource' => $vsource,
       'vtype' => $vtype,
       'vurl' => $vurl,
       'vbd' => $vbd,
       'vshrink' => $vshrink,
       'vdate' => $vdata
   );
   echo json_encode($arr);
   $myfile = fopen("index.html", "w");
   $txt = json_encode($arr);
   fwrite($myfile, $txt);
   fclose($myfile);
?>
