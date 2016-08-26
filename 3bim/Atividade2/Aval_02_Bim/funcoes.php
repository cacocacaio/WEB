<?php
    //conecta com o my sql usando PDO
    function db_connect(){
        
        $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        return $PDO;
    }
    function dateConvert($date){
        if(!strstr($date,'/')){
            //$date está no formato ISO e será convertida para dd/mm/aaaa
            sscanf($date,'%d-%d-%d-',$y,$m,$d);
            return sprintf('%02s/%02d/%04d',$d,$m,$y);
        }
        else
        {
        //$date esta no formato brasileiro e será convertida
        sscanf($date,'%d-%d-%d-',$d,$m,$y);
        return sprintf('%04s/%02d/%02d',$y,$m,$d);
        }
        return false;
    
    }
    
?>
