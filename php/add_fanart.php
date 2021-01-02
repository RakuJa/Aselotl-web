<?php
    session_start();
    $page_head = readfile("../html/head.html");
    include 'header.php';
	if ($_SESSION['logged']==true) {
		$page_body = readfile("../html/add_fanart.html");
	} else {
		header("location: ../php/login.php");
	}
    $page_footer = readfile("../html/footer.html");
?>
