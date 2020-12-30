<?php
    session_start();

    header("location: ../html/index.html");
    
    session_unset();
?>