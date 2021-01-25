<?php
	require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Registrati</title>");
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
		$page_body = (new re_place_holder)->replace("../html/register.html","%ERROR%","ERRORE:<br />$error<br /><br />");
		$page_body = (new re_place_holder)->page_replace($page_body,"%SUCCESS%","");
	}else{
		$page_body = (new re_place_holder)->replace("../html/register.html","%ERROR%","");
		if(isset($_SESSION['success']) && $_SESSION['success']==true){
			$page_body = (new re_place_holder)->page_replace($page_body,"%SUCCESS%","Registrazione avvenuta con successo! Ora accedi con i dati registrati. <br /><br />");
		}else{
			$page_body = (new re_place_holder)->page_replace($page_body,"%SUCCESS%","");
		}
	}
	echo $page_body;
    $page_footer = readfile("../html/footer.html");
	unset($_SESSION["error"]);
	unset($_SESSION["success"]);
?>