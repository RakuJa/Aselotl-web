<?php
	session_start();
	require_once("logic/re_place_holder.php");
	require_once("logic/debugger.php");
    $page_header = readfile("../html/head.html");
	echo "<title>Accedi</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		header("location: ../php/index.php");
	}
	$error = "";
	if(isset($_SESSION["error"])){
		$error = $_SESSION["error"];
	}
	if($error!=""){
		$page_body = (new re_place_holder)->replace("../html/login.html","%ERROR%","ERRORE:<br />$error<br /><br />");
	}else{
		$page_body = (new re_place_holder)->replace("../html/login.html","%ERROR%","");
	}
	echo $page_body;
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>