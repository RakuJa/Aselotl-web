<?php
    session_start();
    $page_head = readfile("html/head.html");
	echo "<title>Accesso vietato</title>";
    $page_body = readfile("html/401.html");
    $page_footer = readfile("html/footer.html");
?>