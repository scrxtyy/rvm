<?php

    $mysqli = new mysqli("192.168.76.188", "rvmmonitor", "LEAAT32!", "adminRVM");

    define('DBINFO', 'mysql:host=192.168.76.188;dbname=adminRVM');
    define('DBUSER','rvmmonitor');
    define('DBPASS','LEAAT32!');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

?>