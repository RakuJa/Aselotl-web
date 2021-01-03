<?php
	require_once('connessione.php');
	require_once('debugger.php');
	require_once('sessione.php');
	$no_error=true;
	$obj_connection = new DBConnection();
	if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        header("location: ../php/admin.php");
        exit();
        $no_error=false;
    }

	$email="";
	if (!isset($_GET['email']) || $_SESSION['logged']==false || 
		($_SESSION['PERMISSION']!=0 && $_SESSION['EMAIL'] != $_GET['email'])) {
		header("location: ../php/access_denied.php");		
	}else {
		$email = $_GET['email'];
		$query = "DELETE FROM User WHERE EMAIL = '$email'";
		$no_error = !$obj_connection->insertDB($query);
		if ($_SESSION['PERMISSION']==0) {
			header("location: ../php/admin.php");
		}else {
			header("location: ../php/logout.php");
		}

	}
?>	