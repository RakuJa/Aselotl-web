<?php
    require_once("logic/sessione.php");
	if ($_SESSION['logged']==false) {
		header("location: 401.php");
	}
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Profilo</title>");
	echo $page_head;
    include '../php/header.php';
	$error = "";
	if(isset($_SESSION["error"])){
		$error = $_SESSION["error"];
	}
	if($error!=""){
		$page_body = (new re_place_holder)->replace("../html/profile.html","%ERROR%","ERRORE:<br />$error<br /><br />");
		$page_body = (new re_place_holder)->page_replace($page_body,"%SUCCESS%","");
	}else{
		$page_body = (new re_place_holder)->replace("../html/profile.html","%ERROR%","");
		if(isset($_SESSION['success']) && $_SESSION['success']==true){
			$page_body = (new re_place_holder)->page_replace($page_body,"%SUCCESS%","Password cambiata con successo! <br /><br />");
		}else{
			$page_body = (new re_place_holder)->page_replace($page_body,"%SUCCESS%","");
		}
	}
	echo $page_body;
	include "../php/logic/profile_logic.php";
	$page_footer = readfile("../html/footer.html");
	unset($_SESSION["error"]);
	unset($_SESSION["success"]);
?>