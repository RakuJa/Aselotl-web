<?php
require_once('upload_handler.php');
require_once('debugger.php');
require_once('connessione.php');
require_once('sessione.php');
$email='';
if($_SESSION['logged']==false){
    new Debugger("User not logged in");
    header('location: ../php/add_fanart.php');
    exit();
}

if (isset($_SESSION['EMAIL'])) {
    $email = $_SESSION['EMAIL'];
}

$target_dir = "../img/fanart/";
$filePath = "";
new Debugger("start");

$gestImg = new gestImg();
$no_error = true;
new Debugger("Gonna upload");
new Debugger($_FILES['uploadImage']['size']);
if($_FILES['uploadImage']['size'] != 0 && $_FILES['uploadImage']['error'] == 0){
	new Debugger("Uploading");
	$uploadResult = $gestImg->uploadImage($target_dir,"uploadImage");
	new Debugger( "Fine upload ");
    if($uploadResult['error']==""){
    	new Debugger( "Nessun errore rilevato durante upload");
        if($uploadResult['path']=="") {
            new Debugger("Pathing non trovato");
            $no_error=false;
        }else {
            new Debugger("Pathing trovato");
            $filePath = $uploadResult['path'];
        }	
    }
    else{
    	new Debugger($uploadResult['error']);
    	new Debugger("Errore rilevato");
        $no_error=false;
	}
}

$obj_connection = new DBConnection();
if(!$obj_connection->create_connection()){
    new Debugger("[Errore di connessione al database]");
    $no_error=false;
}

if ($no_error) {
    new Debugger("Query in preparazione");
    $description = "IL COGNOME DI OSI E";
    $query = "INSERT INTO foto (`PATH`,`DESCRIPTION`,`EMAIL`) VALUES (\"$filePath\",\"$description\",\"$email\")";
    var_dump($query);
    if ($obj_connection->connessione->query($query)) {
        new Debugger("Query eseguita con successo");  
    }else {
        new Debugger("Query fallita con successo"); 
        $no_error = false;
    }

}

$_SESSION["errorImage"] = $error;
header("location: ../php/add_fanart.php");
?>