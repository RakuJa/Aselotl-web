<?php
    require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Pannello amministratore</title>");
	echo $page_head;
    include "../php/header.php";
	$page_body = readfile("../html/admin.html");
    include "../php/logic/admin_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
