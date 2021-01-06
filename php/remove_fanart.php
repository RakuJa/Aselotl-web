<?php
	require_once('connessione.php');
	require_once('debugger.php');
	require_once('sessione.php');
	$no_error=True;
	$obj_connection = new DBConnection();
	if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $no_error=false;
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        header("location: ../php/admin.php");
        exit();
    }

	$email="";
	if (!isset($_GET['image']) || $_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
		exit();		
	}else {
		$image = $_GET['image'];
		$email = $_SESSION['EMAIL'];
		$image = "../img/fanart/".$image;
		$query = "DELETE FROM Foto WHERE foto.PATH = '$image'";
		if ($_SESSION['PERMISSION'] == 0) {
			new Debugger("Admin loggato, mi fido");
			$no_error = $obj_connection->insertDB($query);
		}else {
			new Debugger("UTENTE NORMALE");
			$check = "SELECT * FROM Foto WHERE foto.PATH = '$image' AND EMAIL= '$email";
			if($query_rist=$obj_connection->connessione->query($check)){
                $array_rist=$obj_connection->queryToArray($query_rist);
                $count=0;
                foreach ($array_rist as &$value) {
                    $count=$count+1;
                }
                new Debugger($count);
                if($count==0){
					new Debugger("Non giocare con url. Non sei il benvenuto, immagine non tua");
					header("location: ../php/access_denied.php");
                	$no_error = false;
                    $error="<div class=\'msg_box error_box\'>Stai cercando di rimuovere una foto non tua</div>";
                }else {
                	new Debugger("SEI TU FRA");
                	$no_error = $obj_connection->insertDB($query);
                }
			}else {
				new Debugger("Non giocare con url. Non sei il benvenuto, immagine non tua");
				header("location: ../php/access_denied.php");
				$no_error = false;
			}
		}
	}
	if ($no_error) {
		unlink($image);
		new Debugger("Image deleted");
	}
	header("location: ../php/my_fanart.php");
?>	