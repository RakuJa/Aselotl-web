<?php
$target_dir = "../img/fanart/";

$gestImg = new gestImg();
if($_FILES['uploadImage']['size'] != 0){
	$uploadResult = $gestImg->uploadImage($target_dir,"uploadImage");
    if($uploadResult['error']==""){
    	$no_error=true;
    }
    else{
        $no_error=false;
}
?>