<?php
	require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	require_once("logic/debugger.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Accedi</title>");
	echo $page_head;
    include '../php/header.php';
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		header("location: /dgiachet/");
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