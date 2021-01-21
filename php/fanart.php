<?php
    require_once("connessione.php");
    require_once("debugger.php");
    $page_head = readfile("../html/head.html");
    include "../php/header.php";
    $page_body = readfile("../html/fanart.html");
    include "../php/logic/fanart_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
