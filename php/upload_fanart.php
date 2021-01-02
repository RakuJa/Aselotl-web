<?php
require_once('upload_handler.php');
require_once('debugger.php');
$target_dir = "../img/fanart/";
new Debugger("start");

$gestImg = new gestImg();
$no_error = true;
new Debugger("Gonna upload");
new Debugger($_FILES['uploadImage']['size']);
if($_FILES['uploadImage']['size'] != 0 && $_FILES['upload_image']['error'] == 0){
	new Debugger("Uploading");
	$uploadResult = $gestImg->uploadImage($target_dir,"uploadImage");
	new Debugger( "Fine upload ");
    if($uploadResult['error']==""){
    	new Debugger( "Nessun errore rilevato");
    	$no_error=true;
    }
    else{
    	new Debugger($uploadResult['error']);
    	new Debugger("Errore rilevato");
        $no_error=false;
	}
}

new Debugger( $no_error);
?>