<?php
	require_once("sessione.php");
    require_once('upload_handler.php');
    require_once('debugger.php');
    require_once('connessione.php');
    $no_error = true;
    $email='';
    $description='';
    $keywords = '';
    $error='';
    if($_SESSION['logged']==false){
        new Debugger("User not logged in");
        $_SESSION["errorImage"] = "Utente non ha effettuato l'accesso <br />";
        header('location: ../add_fanart.php');
        exit();
    }
    $no_error =isset($_POST['description']) || isset($_SESSION['EMAIL']) || isset($_POST['keywords']);
    if (!$no_error) {
        new Debugger("Keyword, email or description missing. Fatal error");
        $_SESSION["errorImage"] = "Keyword, email o descrizione mancanti. Fatal error <br />";
        header('location: ../add_fanart.php');
        exit();
    }
    $email = $_SESSION['EMAIL'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];


    $target_dir = "../../img/fanart/";
    $fileIMGID = "";
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
            if($uploadResult['IMGID']=="") {
                $error=$error."IMGID non trovato <br />";
                new Debugger("IMGID non trovato");
                $no_error=false;
            }else {
                new Debugger("IMGID trovato");
                $fileIMGID = $uploadResult['IMGID'];
            }	
        }
        else{
        	new Debugger($uploadResult['error']);
            $error=$error.$uploadResult['error']."<br />";
        	new Debugger("Errore rilevato");
            $no_error=false;
        }
    } else {
		$no_error = false;
		new Debugger(" Immagine caricata vuota <br />");
        $error=$error. "Immagine caricata vuota <br />";
	}

    $obj_connection = new DBConnection();
    if(!$obj_connection->create_connection()){
        $error=$error."Errore di connessione al database <br />";
        new Debugger("[Errore di connessione al database]");
        $no_error=false;
    }

    if ($no_error) {
        $query_error = false;
        new Debugger("Query in preparazione");
        new Debugger($fileIMGID);
        new Debugger($description);
        new Debugger($email);
        new Debugger($keywords);
		$fileName = end(explode("/", $fileIMGID));
        $foto_query = "INSERT INTO foto (`IMGID`,`DESCRIPTION`,`EMAIL`) VALUES (\"$fileName\",\"$description\",\"$email\")";
        $query_error = !$obj_connection->insertDB($foto_query);
        if ($query_error) {
            unlink($fileIMGID);
            $_SESSION["errorImage"] = $error."Errore nell'inserimento dei dati nel db <br />";
            header("location: ../add_fanart.php");
            exit();
        }
        $association_query =""; 
        $array_kw = explode(" ",$keywords);
        foreach ($array_kw as &$kw) {
            preg_replace('/\PL/u', '', $kw);
            $keyword_check_query = "SELECT * FROM keyword WHERE keyword = '$kw'";
            $query_rist=$obj_connection->queryDB($keyword_check_query);
            $data_odierna = date("Y-m-d");
            if (is_null($query_rist)) {
                $keyword_query ="INSERT INTO keyword(`KEYWORD`,`LAST_USED`) VALUES (\"$kw\",\"$data_odierna\")";
            }else {
                if ($query_rist) {
                    $keyword_query ="UPDATE `keyword` SET `LAST_USED` = '$data_odierna' WHERE `keyword`.`KEYWORD` = '$kw'";
                }else {
                    new Debugger("Errore nel realizzare la query");
                    continue;
                }                
            }
            $query_error = !$obj_connection->insertDB($keyword_query);
            if (!$query_error) {
                $association_query = "INSERT INTO `fotokeyword` (`KEYWORD`,`IMGID`) VALUES (\"$kw\",\"$fileName\")";
                $query_error = !$obj_connection->insertDB($association_query);
                if ($query_error) {
                    new Debugger("ERRORE RILEVATO =====");
                    new Debugger($kw);
                    new Debugger($fileName);
                    new Debugger("FINE ERRORE ========");
                }
            }
        }
		$_SESSION["errorImage"] = "";
		$temp = array_shift(explode("?", $_SESSION['prev_prev_page']));
		if($temp == 'my_fanart.php') {
			header("location: ../my_fanart.php");
		} else if($temp == 'fanart.php') {
			header("location: ../fanart.php");
		} else {
			header("location: ../index.php");
		}
    } else {
        unlink($fileIMGID);
        $_SESSION["errorImage"] = $error;
        header("location: ../add_fanart.php");
    }
?>