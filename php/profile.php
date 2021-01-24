<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../401.php");
	}
    $page_head = readfile("../html/head.html");
	echo "<title>Profilo</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
	$page_body = readfile("../html/profile.html");
	include "../php/logic/profile_logic.php";
	$page_footer = readfile("../html/footer.html");
?>