<?php
    session_start();
    $page_header = readfile("../html/head.html");
	echo "<title>Personaggi famosi</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
    $page_body = readfile("../html/famous.html");
    $page_footer = readfile("../html/footer.html");
?>
