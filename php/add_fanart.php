<?php
    session_start();
    $page_head = readfile("../html/head.html");
	echo "<title>Aggiungi fan art</title>";
	$page_theme = readfile("../html/toggle_theme.html");
    include 'header.php';
	if ($_SESSION['logged']==true) {
		$page_body = readfile("../html/add_fanart.html");
	} else {
		header("location: ../php/login.php");
	}
	if(isset($_SESSION["errorImage"])){
		$errorImage = $_SESSION["errorImage"];
		if ($errorImage!="") {
			echo "ERRORE:<br />$errorImage<br /><br />";
		}
	}
    $page_footer = readfile("../html/footer.html");
?>
