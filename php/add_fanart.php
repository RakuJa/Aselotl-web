<?php
	session_start();
	require_once("logic/re_place_holder.php");
    $page_head = readfile("../html/head.html");
	echo "<title>Aggiungi fan art</title>";
	$page_theme = readfile("../html/toggle_theme.html");
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
