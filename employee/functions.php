<?php

    define('DBINFO', 'mysql:host=192.168.1.18;dbname=RVM001');
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