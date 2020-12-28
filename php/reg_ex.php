<?php

    function check_pwd($password){
        if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/',$password)==1){
            return true;
        }
        return false;
    }

    function check_sito($sito){
        $temp_sito = (!preg_match('#^(ht|f)tps?://#', $sito)) ? 'http://' . $sito : $sito;

        if (filter_var($temp_sito, FILTER_VALIDATE_URL)){
            return true;
        }
        return false;
    }
?>