<?php
    if(!isset($_SESSION)) {
		session_start();
	}
    const NOTLOGGED = 2;

    if(!isset($_SESSION['logged'])){
        $_SESSION['logged']=false;
    }

    if(!isset($_SESSION['PERMISSION'])){
        $_SESSION['PERMISSION']=NOTLOGGED;
    }

    if(basename($_SERVER["REQUEST_URI"])!='login_check.php' || basename($_SERVER["REQUEST_URI"])!='upload_fanart.php' || basename($_SERVER["REQUEST_URI"])!='upload_handler.php'){

        if(isset($_SESSION['current_page'])){
            if(basename($_SERVER["REQUEST_URI"])!=$_SESSION['current_page']){
	    		$_SESSION['prev_prev_page']=$_SESSION['prev_page'];
                $_SESSION['prev_page']=$_SESSION['current_page'];
            }
        }

        $_SESSION['current_page']=basename($_SERVER["REQUEST_URI"]);

        if(!isset($_SESSION['prev_page'])){
            $_SESSION['prev_page']='index.php';
        }
    
	    if(!isset($_SESSION['prev_prev_page'])){
            $_SESSION['prev_prev_page']='index.php';
        }
    }
?>