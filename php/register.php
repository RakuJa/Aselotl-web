<?php 

    require_once("sessione.php");
    require_once('connessione.php');
    require_once('debugger.php');
    require_once("reg_ex.php");

    /*Aggiunta header,menu e footer*/
    //new Debugger("Chiamata ad addToHtml iniziata");
    //$page= (new addToHtml)->add("../html/register.html",false,false);
    //new Debugger("Chiamata ad addToHtml terminata");

    if($_SESSION['logged']==true){
        //header('location:index.php');
        //exit();
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
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        $no_error=false;
    }
    $email=$obj_connection->escape_str(trim($email));
    $pwd = $obj_connection->escape_str(trim($pwd));
    //controllo input
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        new Debugger("[La mail inserita non è valida.]");
        $error=$error."<div class=\"msg_box error_box\">'La mail inserita non è valida.</div>";
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
            new Debugger("[Questa mail è già in uso.]");
            $error=$error."<div class=\"msg_box error_box\">Questa mail è già in uso.</div>";
            $no_error=false;
        }
    }
    if(!$query_rist) {
        new Debugger("[Errore nella esecuzione della query]");
        $error=$error."<div class=\"msg_box error_box\">Fatal Error. Query non eseguita</div>";
        $no_error=false;
    }
    if($pwd!=$pwd2){
        new Debugger("[Password e Ripeti Password non coincidono.]");
        $error=$error."<div class=\"msg_box error_box\">Password e Ripeti Password non coincidono.</div>";
        $no_error=false;
    }
    if(!check_pwd($pwd)){
        new Debugger("[La password deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola una minuscola e un numero.] '$pwd'");
        $error=$error."<div class=\"msg_box error_box\">La password deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola una minuscola e un numero.</div>";
        $no_error=false;
    }
    if($no_error){
        $email=$obj_connection->escape_str(trim(htmlentities($email)));
        //$hashed_pwd=hash("sha256",$obj_connection->escape_str(trim($pwd)));
            //check dati inseriti
        $obj_connection->connessione->query("INSERT INTO `utente` (`ID`, `PWD`, `Mail`) VALUES (NULL,\"$hashed_pwd\", \"$mail\", \"$nome\", \"$cognome\", \"$datan\", \"$id_foto\", \"$rsoc\", \"$piva\", \"$permessi\", \"$sesso\")");  
        $query = "INSERT INTO User (`EMAIL`,`PASSWORD`,`PERMISSION`) VALUES (\"$email\",\"$pwd\",1)";
        if(!$obj_connection->queryDB($query)){
            new Debugger("[Errore nel inserimento dei dati]");
            $error="<div class=\"msg_box error_box\">Errore nell' inserimento dei dati</div>";
        }else{
            $obj_connection->close_connection();
            header('location: login.php');
            exit;
        }
        $obj_connection->close_connection();
    }
?>