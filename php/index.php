<?php
    require_once("logic/sessione.php");
    require_once("logic/re_place_holder.php");
    if($_SESSION['current_page']!='index.php'){
        header('location: php/index.php');
    }

	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title xml:lang='en' lang='en'>Home</title>");
	echo $page_head;
    include 'header.php';
    $page_body = readfile("../html/index.html");
    $page_footer = readfile("../html/footer.html");
?>