<?php
    require_once("../php/logic/connessione.php");
    require_once("../php/logic/debugger.php");
    $page_head = readfile("../html/head.html");
    $page_theme = readfile("../html/toggle_theme.html");
    include "../php/header.php";
    $page_body = readfile("../html/fanart.html");
    include "../php/logic/fanart_logic.php";
    $page_footer = readfile("../html/footer.html");
?>
