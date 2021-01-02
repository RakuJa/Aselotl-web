<?php
    session_start();
    $page_head = readfile("../html/head.html");
    include 'header.php';
    $page_body = readfile("../html/famous.html");
    $page_footer = readfile("../html/footer.html");
?>
