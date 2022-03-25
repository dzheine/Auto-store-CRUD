<?php
require_once("../db_connect.php");

    if($_POST){
    try{
        $carid= $_POST['carid'];
        $userid=$_POST['userid'];
        $sql= "DELETE FROM cars WHERE id='$carid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
            header("Location: ../views/cars.php?userid=$userid");
        
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else{
    header("Location: ../index.php");
}