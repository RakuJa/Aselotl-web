<?php 
    require_once("sessione.php");
    require_once('connessione.php');
    require_once('debugger.php');
    require_once("reg_ex.php");
    if($_SESSION['logged']==true){
        header('location:../index.php');
        exit();
    }
    $email='';
    $pwd='';
    $pwd2='';
    $no_error=true;
    $error="";
    if(isset($_POST['email'])){
        $email=$_POST['email'];
    }
    if(isset($_POST['pwd'])){
        $pwd=$_POST['pwd'];
    }
    if(isset($_POST['rpwd'])){
        $pwd2=$_POST['rpwd'];
    } 

    new Debugger("Email recuperata: ".$email);
    new Debugger("Password recuperata: ".$pwd);
    new Debugger("Password2 recuperata: ".$pwd2);

    //connessione db
    $obj_connection = new DBConnection();
    if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."Errore di connessione al database <br />";
        $no_error=false;
    }

    $email=$obj_connection->escape_str(trim(htmlentities($email,ENT_QUOTES)));
    $pwd = $obj_connection->escape_str(trim($pwd));
    //controllo input
	if((!filter_var($email, FILTER_VALIDATE_EMAIL)) && ($email != 'admin') && ($email != 'user')){
		new Debugger("La mail inserita non è valida <br />");
		$error=$error."La mail inserita non è valida <br />";
		$no_error=false;
	}
    new Debugger("Mail inserita: ".$email);
    $query = "SELECT * FROM user WHERE EMAIL = '$email'";
    $query_rist=$obj_connection->queryDB($query);
    if(!$query_rist){
        //entra se la query è scoppiata o se è null (quindi nessun valore)
        if (!is_null($query_rist)) {
            new Debugger("Errore nella esecuzione della query.");
            $error=$error."Fatal Error. Query non eseguita. <br />";
            $no_error=false;
        }else {
            new Debugger("Mail non utilizzata");
        }
    }else {
        new Debugger("Questa mail è già in uso");
        $error=$error."Questa mail è già in uso <br />";
        $no_error=false;
    }
    new debugger("Stage 2");
    if($pwd!=$pwd2){
        new Debugger("Password e Ripeti Password non coincidono");
        $error=$error."Password e Ripeti Password non coincidono <br />";
        $no_error=false;
    }
    if(!check_pwd($pwd)){
        new Debugger("La password deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola una minuscola e un numero '$pwd'");
        $error=$error."La password deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola una minuscola e un numero <br />";
        $no_error=false;
    }
    new debugger("checkpoint 3");
    if($no_error){
        new debugger("checkpoint 4");
        $hashed_pwd=hash("sha512",$pwd);
        //check dati inseriti
        $query = "INSERT INTO user (`EMAIL`,`PASSWORD`,`PERMISSION`) VALUES (\"$email\",\"$hashed_pwd\",1)";
        new debugger("checkpoint 5");
        if($obj_connection->insertDB($query)){
            new debugger("checkpoint 6");
            if ($obj_connection) $obj_connection->close_connection();
            $_SESSION["error"]="";
            new Debugger("oro");
            header('location: ../login.php');
            exit();
        }else{  
            new debugger("checkpoint 6");
            new Debugger("Errore nel inserimento dei dati");
            $error="Errore nell' inserimento dei dati <br />";
        }
        if ($obj_connection) $obj_connection->close_connection();
    }
    new debugger($error);
    $_SESSION["error"] = $error;
    //header("location: ../register.php");

?>
