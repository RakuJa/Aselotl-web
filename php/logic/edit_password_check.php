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
        $error=$error."Errore di connessione al database<br />";
        header("location: ../php/index.php");
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
			$error = $error."Password e Ripeti Password non coincidono.<br />";
			new Debugger("pwd non corrisponde");
		}else {
			if(!check_pwd($pwd)){
        		$error=$error."La password deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola una minuscola e un numero.<br />";
        		new Debugger("pwd non valida");
    		}else {
    			new Debugger("preparo alla query");
				$hashed_pwd=hash("sha512",$pwd);
				$query = "UPDATE user SET PASSWORD = '$hashed_pwd' WHERE EMAIL = '$email'";
				$no_error = !$obj_connection->insertDB($query);
				if ($_SESSION['PERMISSION']==0) {
					header("location: ../admin.php");
				}else {
					header("location: logout.php");
				}
			}
		}

	}
	new Debugger($error);
?>