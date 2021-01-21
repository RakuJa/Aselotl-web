<?php
    session_start();
    $page_header = readfile("../html/head.html"); ?>
	<title>Registrati</title>
	<?php
    include 'header.php';
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		header("location: ../php/index.php");
	}
	$page_body = readfile("../html/register/register_top.html");
	if(isset($_SESSION["error"])){
		$error = $_SESSION["error"];
		echo "ERRORE:<br />$error<br /><br />";
	}
	$page_body = readfile("../html/register/register_bottom.html");
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>