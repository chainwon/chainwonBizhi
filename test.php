
<?php
    $url = "https://api.weibo.com/2/statuses/upload_url_text.json";
　　$data = array ("access_token" => "2.00qHKs6Gr8r3YC86e96b35ddVykEWE","status" => "新浪API测试","url" => "http://v3.chainwon.com/assets/img/daytime.jpg");
　　$ch = curl_init();
　　curl_setopt($ch, CURLOPT_URL, $url);
　　curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
　　// post数据
　　curl_setopt($ch, CURLOPT_POST, 1);
　　// post的变量
　　curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
　　$output = curl_exec($ch);
　　curl_close($ch);
　　//打印获得的数据
　　print_r($output);
?>
