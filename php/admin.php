<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html");
    include 'header.php';
    $page_body = readfile("../html/admin.html");
    $page_footer = readfile("../html/footer.html");
?>
