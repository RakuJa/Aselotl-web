<?php
	require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title xml:lang='en' lang='en'>Fun facts</title>");
	echo $page_head;
    include('../php/header.php');
    $page_body = readfile("../html/fun_facts.html");
    $page_footer = readfile("../html/footer.html");
?>
