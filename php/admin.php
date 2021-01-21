<?php
    session_start();
    $page_head = readfile("../html/head.html"); 
    include "../php/header.php";
	$page_body = readfile("../html/admin.html");
    include "../php/logic/admin_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
