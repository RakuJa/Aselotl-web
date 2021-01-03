<?php
    session_start();
	header('refresh:8; url= ../php/index.php');
    $page_head = readfile("../html/head.html");
    include 'header.php';
    $page_body = readfile("../html/access_denied.html");
    $page_footer = readfile("../html/footer.html");
?>