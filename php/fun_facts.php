﻿<?php
    session_start();
    $page_head = readfile("../html/head.html"); ?>
	<title xml:lang="en" lang="en">Fun facts</title>
	<?php
	$page_theme = readfile("../html/toggle_theme.html");
    include('../php/header.php');
    $page_body = readfile("../html/fun_facts.html");
    $page_footer = readfile("../html/footer.html");
?>
