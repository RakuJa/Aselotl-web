<?php
	require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Aggiungi fan art</title>");
	echo $page_head;
    include 'header.php';
	$errorImage = "";
	if($_SESSION['logged'] == false){
		header("location: ../php/login.php");
	}
	if(isset($_SESSION["errorImage"])){
		$errorImage = $_SESSION["errorImage"];
	}
	if($errorImage!=""){
		$page_body = (new re_place_holder)->replace("../html/add_fanart.html","%ERROR%","ERRORE:<br />$errorImage<br /><br />");
	}else{
		$page_body = (new re_place_holder)->replace("../html/add_fanart.html","%ERROR%","");
	}
	echo $page_body;
	$page_footer = readfile("../html/footer.html");
	unset($_SESSION["errorImage"]);
?>
