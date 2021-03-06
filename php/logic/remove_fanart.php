<?php
	require_once("sessione.php");
	require_once('connessione.php');
	require_once('debugger.php');
	$no_error=True;
	$obj_connection = new DBConnection();
	if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $no_error=false;
        $error=$error."Errore di connessione al database <br />";
        header("location: ../404.php");
        exit();
    }

	$email="";
	if (!isset($_GET['image']) || $_SESSION['logged']==false) {
		header("location: ../401.php");
		exit();		
	}else {
		$image = ltrim($_GET['image'],'\.\.\/'); 
		$email = $_SESSION['EMAIL'];
		$image = "../../img/fanart/".$image;
		$imagedb = $_GET['image'];
		$query = "DELETE FROM foto WHERE foto.IMGID = '$imagedb'";
		header("location: ../my_fanart.php");
		var_dump($query);
		if ($_SESSION['PERMISSION'] == 0) {
			new Debugger("Admin loggato, mi fido");
			$no_error = $obj_connection->insertDB($query);
			if (isset($_GET['adm']) && $_GET['adm']==0) {
				header("location: ../fanart.php");
			}
		}else {
			new Debugger("UTENTE NORMALE");
			$check = "SELECT * FROM foto WHERE foto.IMGID = '$imagedb' AND EMAIL= '$email'";
			var_dump($check);
			$query_rist=$obj_connection->queryDB($check);
			if($query_rist){
				$no_error = $obj_connection->insertDB($query);
			}else {
				if(is_null($query_rist)){
					new Debugger("Non giocare con url. Non sei il benvenuto, immagine non tua");
					header("location: ../access_denied.php");
                	$no_error = false;
                    $error="Stai cercando di rimuovere una foto non tua <br />";
				}else {
					new Debugger("Errore di query con il Database");
					header("location: ../404.php");
					$no_error = false;
				}
			}
		}
	}
	if ($no_error) {
		unlink($image);
		new Debugger("Image deleted");
	}
	
?>	