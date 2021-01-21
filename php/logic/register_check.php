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
    $email=$obj_connection->escape_str(trim($email));
    $pwd = $obj_connection->escape_str(trim($pwd));
    //controllo input
	if((!filter_var($email, FILTER_VALIDATE_EMAIL)) && ($email != 'admin') && ($email != 'user')){
		new Debugger("La mail inserita non è valida <br />");
		$error=$error."La mail inserita non è valida <br />";
		$no_error=false;
	}
    new Debugger("Mail inserita: ".$email);
    $query = "SELECT * FROM User WHERE EMAIL = '$email'";
    $query_rist=$obj_connection->connessione->query($query);
    if($query_rist){
        $array_rist=$obj_connection->queryToArray($query_rist);
        var_dump($query_rist);
        $count=0;
        foreach ($array_rist as &$value) {
            $count=$count+1;
        }
        new Debugger($count);
        if($count!=0){
            new Debugger("Questa mail è già in uso");
            $error=$error."Questa mail è già in uso <br />";
            $no_error=false;
        }
    }
    if(!$query_rist) {
        new Debugger("Errore nella esecuzione della query");
        $error=$error."Fatal Error. Query non eseguita <br />";
        $no_error=false;
    }
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
    if($no_error){
        $email=$obj_connection->escape_str(trim(htmlentities($email)));
        $hashed_pwd=hash("sha512",$obj_connection->escape_str(trim($pwd)));
        //check dati inseriti
        $query = "INSERT INTO User (`EMAIL`,`PASSWORD`,`PERMISSION`) VALUES (\"$email\",\"$hashed_pwd\",1)";
        if($obj_connection->insertDB($query)){
            if ($obj_connection) $obj_connection->close_connection();
            $_SESSION["error"]="";
            header('location: ../login.php');
            exit();
        }else{  
            new Debugger("Errore nel inserimento dei dati");
            $error="Errore nell' inserimento dei dati <br />";
        }
        if ($obj_connection) $obj_connection->close_connection();
    }

    $_SESSION["error"] = $error;
    header("location: ../register.php");

?>
