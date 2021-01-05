<?php
    session_start();
    $page_header = readfile("../html/head.html"); ?>
	<title>Errore 404</title>
	<?php
    $page_body = readfile("../html/404.html");
    $page_footer = readfile("../html/footer.html");
?>
