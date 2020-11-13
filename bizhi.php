<?php
$file = 'number.txt';
$file0 = 'viewnumber.txt';
$file1 = 'peoplenumber.txt';
$file2 = 'allnumber.txt';
$file3 = 'people.txt';
$file4 = 'view.txt';
$number = file_get_contents($file);
$viewnumber = file_get_contents($file0);
$peoplenumber = file_get_contents($file1);
$people = file_get_contents($file3);
$view = file_get_contents($file4);
$allnumber = $viewnumber + $peoplenumber;

if($number < $peoplenumber){
	copy('./people/'.$number.'.jpg','./'.$number.'.png');
  rename('./'.$number.'.png','./bizhi.png');
}
if($number > $peoplenumber){
	$number -= $peoplenumber;
	copy('./view/'.$number.'.jpg','./'.$number.'.png');
  rename('./'.$number.'.png','./bizhi.png');
  $number += $peoplenumber;
}

copy('./people/'.$people.'.jpg','./'.$people.'.png');
rename('./'.$people.'.png','./people.png');
copy('./view/'.$view.'.jpg','./'.$view.'.png');
rename('./'.$view.'.png','./view.png');

if ($number == $allnumber) {
  $number = 1;
} else {
  $number += 1;
}
$wb0=fopen("number.txt","wb");
fwrite($wb0,$number);
fclose($wb0);
if ($people == $peoplenumber) {
  $people = 1;
} else {
  $people += 1;
}
if ($view == $viewnumber) {
  $view = 1;
} else {
  $view += 1;
}
$wb1=fopen("view.txt","wb");
$wb2=fopen("people.txt","wb");
fwrite($wb1,$view);
fwrite($wb2,$people);
fclose($wb1);
fclose($wb2);
?>
