<?php
    require_once("logic/sessione.php");
	if ($_SESSION['logged']==false) {
		header("location: ../401.php");
	}
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Profilo</title>");
	echo $page_head;
    include '../php/header.php';
	$page_body = readfile("../html/profile.html");
	include "../php/logic/profile_logic.php";
	$page_footer = readfile("../html/footer.html");
?>