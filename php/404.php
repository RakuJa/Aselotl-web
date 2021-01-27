<?php
    session_start();
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Errore 404</title>");
	echo $page_head;
    $page_body = readfile("../html/404.html");
    $page_footer = readfile("../html/footer.html");
?>
