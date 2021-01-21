<?php
    session_start();
    $page_header = readfile("../html/head.html");
	echo "<title>Accedi</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		header("location: ../php/index.php");
	}
	$page_body = readfile("../html/login_top.html");
	if(isset($_SESSION["error"])){
		$error = $_SESSION["error"];
		echo "ERRORE:<br />$error<br /><br />";
	}
	$page_body = readfile("../html/login_bottom.html");
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>