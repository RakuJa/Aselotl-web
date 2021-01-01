<?php
    require_once('connessione.php');
    require_once('debugger.php');
    require_once('sessione.php');

    if($_SESSION['logged']==true){
        new Debugger("User already logged in");
        header('location: ../html/index.html');
        exit();
    }
    new Debugger("User not logged in");

    if(isset($_COOKIE['user_email'])){
        $email=$_COOKIE['user_email'];
        $check='checked="checked"';
    }else{
        $email='';
        $check='';
    }

    if(isset($_COOKIE['user_pwd'])){
        $pwd=$_COOKIE['user_pwd'];
    }else{
        $pwd='';
    }

    new Debugger("Cookies checked");

    $error='';

    // se ci sono valori in _POST cerca di fare il login o stampa errore

    if(isset($_POST['email'])){
        new Debugger("Found email on post");
        $email=$_POST['email'];
        new Debugger("Email is ".$email);
        if(isset($_POST['pwd'])){
            $pwd=$_POST['pwd'];
            new Debugger("Found password on post");
            new Debugger("Password is ".$pwd);
        }
        if(isset($_POST['remember_me'])){
            $check='checked="checked"';
        }
        new Debugger("Trying connection with database...");
        $connection_established = False;
        $obj_connection = new DBConnection();
        $connection_established = $obj_connection->create_connection();
        if($connection_established){
            new Debugger("Connessione con il DB instaurata");
            $email=$obj_connection->escape_str(trim($email));
            new debugger("Prima dell'hash");
            $pwd = $obj_connection->escape_str(trim($pwd));
            new debugger("Prima dell'hash");
            $hashed_pwd=hash("sha512",$pwd);
            new debugger($hashed_pwd);
            //$pwd = $obj_connection->escape_str(trim($pwd));
            $query = "SELECT * FROM User WHERE EMAIL = '$email' AND PASSWORD = '$hashed_pwd'";
            if($query_rist=$obj_connection->connessione->query($query)){
                $array_rist=$obj_connection->queryToArray($query_rist);
                $count=0;
                foreach ($array_rist as &$value) {
                    $count=$count+1;
                }
                new Debugger($count);
                if($count==0){
                    $error="[Le credenziali inserite non sono corrette]";
                }else{
                    $_SESSION['logged']=true;
                    $_SESSION['EMAIL']=$email;
                    $_SESSION['ID']=$log_array[0]['ID'];
                    $_SESSION['PERMISSION']=$log_array[0]['Permessi'];
                    new Debugger("Logged in!");
                    if(isset($_POST['remember_me'])){
                        setcookie("user_email",$email,time()+60*60*24*30,'/');
                        setcookie("user_pwd",$pwd,time()+60*60*24*30,'/'); 
                        new Debugger("Logged for a long time");   
                    }else{
                        setcookie("user_email","",time()-3600,'/');
                        setcookie("user_pwd","",time()-3600,'/'); 
                        new Debugger("Logged for a short while");
                    }

                    $obj_connection->close_connection();
                
                    header('location: ../html/index.html');
                    exit;
                }
            }else {
                $error="[La query non è andata a buon fine]";
            }
            $obj_connection->close_connection();

        }else{
            new Debugger("Connessione con il DB fallita");
            $error=(new errore('DBConnection'))->printHTMLerror();
        }

    }else {
        $error = "Nessun dato trovato dentro url";
    }

    $_SESSION["error"] = $error;
    new Debugger($error);

    header("location: ../php/login.php");
?>