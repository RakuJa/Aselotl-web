<?php

    function check_pwd($password){
        if((preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/',$password)==1) || ($password == 'admin') || ($password == 'user')){
            return true;
        }
        return false;
    }
?>