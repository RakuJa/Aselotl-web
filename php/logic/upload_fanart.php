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
    $query_error = false;
    new Debugger("Query in preparazione");
    new Debugger($filePath);
    new Debugger($description);
    new Debugger($email);
    new Debugger($keywords);
    $foto_query = "INSERT INTO foto (`PATH`,`DESCRIPTION`,`EMAIL`) VALUES (\"$filePath\",\"$description\",\"$email\")";
    $query_error = !$obj_connection->insertDB($foto_query);
    if ($query_error) {
        unlink($filePath);
        $_SESSION["errorImage"] = $error."errore nel inserimento nel db";
        header("location: ../php/add_fanart.php");
    }
    $association_query =""; 
    $array_kw = explode(" ",$keywords);
    foreach ($array_kw as &$kw) {
        preg_replace('/\PL/u', '', $kw);
        $keyword_check_query = "SELECT * FROM keyword WHERE keyword = '$kw'";
        if($query_rist=$obj_connection->connessione->query($keyword_check_query)){
            $array_rist=$obj_connection->queryToArray($query_rist);
            $count=0;
            foreach ($array_rist as &$value) {
                $count=$count+1;
            }
            $data_odierna = date("Y-m-d");
            if ($count==0) {
                $keyword_query ="INSERT INTO keyword(`KEYWORD`,`LAST_USED`) VALUES (\"$kw\",\"$data_odierna\")";
            }else {
                $keyword_query ="UPDATE `keyword` SET `LAST_USED` = '$data_odierna' WHERE `keyword`.`KEYWORD` = '$kw'";
            }
            $query_error = !$obj_connection->insertDB($keyword_query);
            if (!$query_error) {
                $query_error =
                $association_query = "INSERT INTO `fotokeyword` (`KEYWORD`,`PATH`) VALUES (\"$kw\",\"$filePath\")";
                $query_error = !$obj_connection->insertDB($association_query);
                if ($query_error) {
                    new Debugger("ERRORE RILEVATO =====");
                    new Debugger($kw);
                    new Debugger($filePath);
                    new Debugger("FINE ERRORE ========");
                }
            }
        }
    }
    $_SESSION["errorImage"] = $error;
    header("location: ../php/fanart.php");
}

$_SESSION["errorImage"] = $error;

//header("location: ../php/add_fanart.php");
?>