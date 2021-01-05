<?php
    session_start();
    $page_head = readfile("../html/head.html"); ?>
	<title>Accesso vietato</title>
	<?php
    $page_body = readfile("../html/access_denied.html");
    $page_footer = readfile("../html/footer.html");
?>