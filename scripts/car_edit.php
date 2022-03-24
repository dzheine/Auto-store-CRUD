<?php

require_once("../db_connect.php");

if($_POST){
    try{
        $carid=$_POST['carid'];
        $number=$_POST['number'];
        $brand=$_POST['brand'];
        $model=$_POST['model'];
        $color=$_POST['color'];
        $userid= $_POST['userid'];
// var_dump($_POST);
        $sql= "UPDATE cars SET number = '$number', brand = '$brand', model = '$model', color = '$color', user_id = '$userid' WHERE id='$carid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
    //    var_dump($result);
        if($result){
            header("Location: ../index.php");
        }
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else {
    header("Location: ../index.php");
}