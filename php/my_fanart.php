<?php
    session_start();
	if (!isset($_SESSION['logged']) || $_SESSION['logged']==false) {
		header("location: ../401.php");
	}
    $page_head = readfile("../html/head.html");
	echo "<title xml:lang='en' lang='en'>Le mie fan art</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include "../php/header.php";
	$page_body = readfile("../html/my_fanart.html");
	include "../php/logic/my_fanart_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
