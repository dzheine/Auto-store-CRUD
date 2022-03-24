<?php
require_once("../db_connect.php");

if($_GET){
    try{
        $carid= $_GET['carid'];
        $sql= "DELETE FROM cars WHERE id='$carid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
        if($result){
            header("Location: ../index.php");
        }
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else{
    header("Location: ../index.php");
}