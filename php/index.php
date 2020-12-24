<?php
    require_once('connessione.php');
    require_once('debugger.php');
    //$_POST['ID_Viewer'],$_POST['ID_Recensione']
    $foo = True;
    $obj_connection = new DBConnection();
    $foo = $obj_connection->create_connection();
    if ($foo) {
        new Debugger("Connessione con il DB instaurata");
    }else{
        new Debugger("Connessione con il DB fallita");
    }
    $query ="SELECT * FROM User WHERE PASSWORD = 'osi'";
    if($query_rist=$obj_connection->connessione->query($query)){
        $array_rist=$obj_connection->queryToArray($query_rist);
        foreach ($array_rist as &$value) {
            echo $value["EMAIL"];
            new Debugger($value);
        }
    }else {
        new Debugger("Query fallita");
    }
?>