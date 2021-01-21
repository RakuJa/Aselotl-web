<?php
	session_start();
    $page_head = readfile("../html/head.html");
	echo "<title xml:lang='en' lang='en'>Fan art</title>";
    $page_theme = readfile("../html/toggle_theme.html");
    include "../php/header.php";
    $page_body = readfile("../html/fanart.html");
    include "../php/logic/fanart_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
