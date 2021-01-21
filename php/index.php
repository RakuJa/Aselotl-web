<?php
    session_start();
    $page_head = readfile("../html/head.html"); 
	echo "<title xml:lang='en' lang='en'>Home</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
    $page_body = readfile("../html/index.html");
    $page_footer = readfile("../html/footer.html");
?>