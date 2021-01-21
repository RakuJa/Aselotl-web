<?php
    session_start();
    $page_head = readfile("../html/head.html"); ?>
	<title>Regolamento</title>
	<?php
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
    $page_body = readfile("../html/rules.html");
    $page_footer = readfile("../html/footer.html");
?>
    
