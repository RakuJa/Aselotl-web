<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html");
	echo "<title>Modifica password</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
    $email="";
    if (isset($_GET['email'])) {
        $email=$_GET['email'];
    }else {
        $email=$_SESSION['EMAIL'];
    }
	$page_body = readfile("../html/edit_password_top.html");
	echo '<input type="text" required name="email" id="email" maxlength="50" class="full_width_input" readonly value="'.$email.'">';
	$page_body = readfile("../html/edit_password_bottom.html");
	$page_footer = readfile("../html/footer.html");
?>
