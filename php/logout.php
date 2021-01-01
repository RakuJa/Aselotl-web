<?php
    session_start();

    
    setcookie("user_email","",time()-3600,'/');
    setcookie("user_pwd","",time()-3600,'/'); 
    header("location: ../html/index.html");
    
    session_unset();
?>