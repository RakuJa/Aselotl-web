<?php
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	require_once("sessione.php");
    require_once('connessione.php');
    require_once('debugger.php');
    if($_SESSION['logged']==true){
        new Debugger("User already logged in");
        if($_SESSION['prev_prev_page'] == 'index.php' || $_SESSION['prev_prev_page'] == 'dgiachet') {
			header("location: ".$protocol.$_SERVER['HTTP_HOST']."/dgiachet/");
		} else {
			header("location: ".$protocol.$_SERVER['HTTP_HOST']."/dgiachet/php/".$_SESSION['prev_prev_page']); 
		}
        exit();
    }
	var_dump($_SESSION['prev_prev_page']);
	var_dump($_SESSION['prev_page']);
	var_dump($_SESSION['current_page']);
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

    $error="";

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
            new debugger("Prima del hash");
            $pwd = $obj_connection->escape_str(trim($pwd));
            new debugger("Dopo del hash");
            $hashed_pwd=hash("sha512",$pwd);
            new debugger($hashed_pwd);
            $query = "SELECT * FROM user WHERE EMAIL = '$email' AND PASSWORD = '$hashed_pwd'";
            $permission = 2;
            $query_rist=$obj_connection->queryDB($query);
            if($query_rist){
                foreach ($query_rist as &$value) {
                    $permission = filter_var($value["PERMISSION"], FILTER_VALIDATE_BOOLEAN);
                }
                $_SESSION['logged']=true;
                $_SESSION['EMAIL']=$email;
                $_SESSION['PERMISSION']=$permission;
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
                if($_SESSION['prev_prev_page'] == 'index.php' || $_SESSION['prev_prev_page'] == 'dgiachet') {
					header("location: ".$protocol.$_SERVER['HTTP_HOST']."/dgiachet/");
				} else {
					header("location: ".$protocol.$_SERVER['HTTP_HOST']."/dgiachet/php/".$_SESSION['prev_prev_page']);
				}
			exit();
            }else {
                if (is_null($query_rist)) {
                    new Debugger("Le credenziali inserite non sono corrette");
                    $error=$error."Le credenziali inserite non sono corrette<br />";
                }else {
                    new Debugger("query andata male");
                    $error=$error."La query non è andata a buon fine<br />";
                }
            }
        }else{
            new Debugger("Connessione con il DB fallita");
            $error=$error."Connessione con il database fallita";
        }

    }else {
        $error = $error."Nessun dato trovato dentro url";
    }

    $_SESSION["error"] = $error;
    new Debugger($error);

    header("location: /dgiachet/php/login.php");
?>
