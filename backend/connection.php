<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "lojavirtual";

    try{
        $mysql = new mysqli($host,$user,$pass,$db);
    }catch(Exception $e){
        echo "<script>alert($e)</script>";
    }
    
?>