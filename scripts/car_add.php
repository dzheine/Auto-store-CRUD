<?php

require_once("../db_connect.php");

if($_POST){
//    var_dump($_POST);
    if(!empty($_POST['number']) && !empty($_POST['brand'])&& !empty($_POST['model']) && !empty($_POST['color'])){
            $number=$_POST['number'];
            $brand=$_POST['brand'];
            $model=$_POST['model'];
            $color=$_POST['color'];
            $userid=$_POST['userid'];
    } else{
        echo "Please fill the fields";
    }
} else{
    header("Location: ../views/car_add.php");
    die;
}
//var_dump($userid);
try{
    $sql = "INSERT INTO cars (number, brand, model, color, user_id) VALUES ('$number', '$brand', '$model', '$color', $userid)";
    $query = $conn->prepare($sql);
    $query->execute();
   header("Location: ../views/cars.php?userid=$userid");

} catch(PDOException $e){
    echo "Insert failed: ". $e->getMessage();
}