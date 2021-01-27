<?php
    require_once("logic/sessione.php");
	if (!isset($_SESSION['logged']) || $_SESSION['logged']==false) {
		header("location: 401.php");
	}
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title xml:lang='en' lang='en'>Le mie fan art</title>");
	echo $page_head;
    include "../php/header.php";
	$page_body = readfile("../html/my_fanart.html");
	include "../php/logic/my_fanart_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
