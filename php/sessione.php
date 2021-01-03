<?php
    session_start();

    const NOTLOGGED = 2;

    if(!isset($_SESSION['logged'])){
        $_SESSION['logged']=false;
    }
    if(!isset($_SESSION['ID'])){
        $_SESSION['ID']='';
    }
    if(!isset($_SESSION['PERMISSION'])){
        $_SESSION['PERMISSION']=NOTLOGGED;
    }

    if(isset($_SESSION['current_page'])){
        if(basename($_SERVER["REQUEST_URI"])!=$_SESSION['current_page']){
            $_SESSION['prev_page']=$_SESSION['current_page'];
        }
    }
    $_SESSION['current_page']=basename($_SERVER["REQUEST_URI"]);

    if(!isset($_SESSION['prev_page'])){
        $_SESSION['prev_page']='index.php';
    }
?>