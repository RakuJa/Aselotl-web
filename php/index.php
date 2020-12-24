<?php
    require_once('connessione.php');
    $foo = True;
    echo "ciao";
    $obj_connection = new DBConnection();
    $foo = $obj_connection->create_connection();
    if ($foo) {
        echo "Nice";
    }else{
        echo "Insomma";
    }
    $pass = "osi"; 
    //$query ="SELECT * FROM User WHERE PASSWORD = ".$pass;
    $query ="SELECT * FROM User WHERE 1=1"
    if($query_rist=$obj_connection->connessione->query($query)){
        $array_rist=$obj_connection->queryToArray($query_rist);
        if(count($array_rist)>0){
            $query_rist->close();
        }
    }else {
        echo "WHAT";
    }
?>