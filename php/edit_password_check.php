<?php
	require_once('connessione.php');
	require_once('debugger.php');
	require_once('sessione.php');
	require_once("reg_ex.php");
	$no_error=true;
	$error="";
	$obj_connection = new DBConnection();
	if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        header("location: ../php/admin.php");
        exit();
        $no_error=false;
    }
	$email="";
	if (!isset($_POST['email']) || $_SESSION['logged']==false || 
		!isset($_POST['pwd']) || !isset($_POST['rpwd']) ||
		($_SESSION['PERMISSION']!=0 && $_SESSION['EMAIL'] != $_POST['email'])) {
		header("location: ../php/access_denied.php");		
	}else {
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$pwd2 = $_POST['rpwd'];
		$email=$obj_connection->escape_str(trim($email));
    	$pwd = $obj_connection->escape_str(trim($pwd));
		if ($pwd!=$pwd2) {
			$error = $error."<div class=\"msg_box error_box\">Password e Ripeti Password non coincidono.</div>";
			new Debugger("pwd non corrisponde");
		}else {
			if(!check_pwd($pwd)){
        		$error=$error."<div class=\"msg_box error_box\">La password deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola una minuscola e un numero.</div>";
        		new Debugger("pwd non valida");
    		}else {
    			new Debugger("preparo alla query");
				$hashed_pwd=hash("sha512",$pwd);
				$query = "UPDATE User SET PASSWORD = '$hashed_pwd' WHERE EMAIL = '$email'";
				$no_error = !$obj_connection->insertDB($query);
				if ($_SESSION['PERMISSION']==0) {
					header("location: ../php/admin.php");
				}else {
					header("location: ../php/logout.php");
				}
			}
		}

	}
	new Debugger($error);
?>