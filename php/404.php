<?php
    session_start();
    $page_header = readfile("../html/head.html");
	echo "<title>Errore 404</title>";
    $page_body = readfile("../html/404.html");
    $page_footer = readfile("../html/footer.html");
?>
