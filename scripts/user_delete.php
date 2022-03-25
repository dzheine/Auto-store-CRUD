<?php

require_once("../db_connect.php");

if(isset($_GET)){
    try{
       $userid= $_GET['userid'];

        $sql= "DELETE FROM users WHERE id='$userid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
        if($result){
// var_dump($result);
            header("Location: ../index.php");
        }
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else{
    header("Location: ../index.php");
}