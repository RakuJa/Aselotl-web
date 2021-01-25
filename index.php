<?php
    require_once("php/logic/sessione.php");
	require_once("php/logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("html/head.html","%TITLE%","<title xml:lang='en' lang='en'>Home</title>");
	echo $page_head;
    include 'php/header.php';
    $page_body = readfile("html/index.html");
    $page_footer = readfile("html/footer.html");
?>