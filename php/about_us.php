<?php
    require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Chi siamo</title>");
	echo $page_head;
    include 'header.php';
    $page_body = readfile("../html/about_us.html");
    $page_footer = readfile("../html/footer.html");
?>
