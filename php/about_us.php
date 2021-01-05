<?php
    session_start();
    $page_head = readfile("../html/head.html"); ?>
	<title>Chi siamo</title>
	<?php
    include 'header.php';
    $page_body = readfile("../html/about_us.html");
    $page_footer = readfile("../html/footer.html");
?>
