<?php
require_once('upload_handler.php');
require_once('debugger.php');
require_once('connessione.php');
require_once('sessione.php');
$no_error = true;
$email='';
$description='';
$keywords = '';
$error='';
if($_SESSION['logged']==false){
    new Debugger("User not logged in");
    $_SESSION["errorImage"] = "User not logged in";
    header('location: ../php/add_fanart.php');
    exit();
}
$no_error =isset($_POST['description']) || isset($_SESSION['EMAIL']) || isset($_POST['keywords']);
if (!$no_error) {
    new Debugger("Keyword, email or description missing. Fatal error");
    $_SESSION["errorImage"] = "Keyword, email or description missing. Fatal error";
    header('location: ../php/add_fanart.php');
    exit();
}
$email = $_SESSION['EMAIL'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];


$target_dir = "../img/fanart/";
$filePath = "";
new Debugger("start");

$gestImg = new gestImg();

new Debugger("Gonna upload");
new Debugger($_FILES['uploadImage']['size']);
if($_FILES['uploadImage']['size'] != 0 && $_FILES['uploadImage']['error'] == 0){
	new Debugger("Uploading");
	$uploadResult = $gestImg->uploadImage($target_dir,"uploadImage");
	new Debugger( "Fine upload ");
    if($uploadResult['error']==""){
    	new Debugger( "Nessun errore rilevato durante upload");
        if($uploadResult['path']=="") {
            $error=$error."Pathing non trovato";
            new Debugger("Pathing non trovato");
            $no_error=false;
        }else {
            new Debugger("Pathing trovato");
            $filePath = $uploadResult['path'];
        }	
    }
    else{
    	new Debugger($uploadResult['error']);
        $error=$error.$uploadResult['error'];
    	new Debugger("Errore rilevato");
        $no_error=false;
	}
}

$obj_connection = new DBConnection();
if(!$obj_connection->create_connection()){
    $error=$error."[Errore di connessione al database]";
    new Debugger("[Errore di connessione al database]");
    $no_error=false;
}

if ($no_error) {
    new Debugger("Query in preparazione");
    new Debugger($filePath);
    new Debugger($description);
    new Debugger($email);
    new Debugger($keywords);
    $foto_query = "INSERT INTO foto (`PATH`,`DESCRIPTION`,`EMAIL`) VALUES (\"$filePath\",\"$description\",\"$email\")";
    $keyword_check_query = "";
    $keyword_query ="";
    $association_query =""; 
    if ($obj_connection->connessione->query($foto_query)) {
        new Debugger("Query eseguita con successo");
    }else {
        new Debugger("Query fallita con successo"); 
        $error=$error."Query fallita";
        $no_error = false;
    }

}

$_SESSION["errorImage"] = $error;
header("location: ../php/add_fanart.php");
?>