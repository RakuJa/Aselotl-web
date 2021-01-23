<?php

    class DBConnection{
        const HOST_DB ="localhost";
        const USERNAME ="dgiachet";
        const PASSWORD ="ounu6NaiCae4oath";
        const DATABASE_NAME ="dgiachet";
        public $connessione = null;
        
        public function create_connection(){
            $this->connessione = new mysqli(static::HOST_DB,static::USERNAME,static::PASSWORD,static::DATABASE_NAME);
            if($this->connessione->connect_error){ return false;}
            return true;
        }

        public function close_connection(){
            if($this->connessione){
                $this->connessione->close();
            }
        }
        //return null if empty, return false if query fails
        public function queryDB($query){
            if($queryResult = $this->connessione->query($query)){
                $result=array();
                if($queryResult && $queryResult->num_rows>0){
                    while($row=$queryResult->fetch_array(MYSQLI_ASSOC)){
                        array_push($result,$row);
                    }
                } 
                if ($result==false) {return NULL;}
                return $result;
            }else{
                return false;
            }
        }
        
        public function insertDB($query){
            return $this->connessione->query($query);
        }

        public function escape_str($string){
            return $this->connessione->real_escape_string($string);
        }

        //restituisce matrice contenente tabelle risultato della query passata
        public function queryToArray($query_res){
            $arr=array();
            if($query_res){
                while($row=$query_res->fetch_array(MYSQLI_ASSOC)){
                    array_push($arr,$row);
                }
            }
            return $arr;
        }
    }
?>