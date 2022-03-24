<?php

require_once("../db_connect.php");

if($_POST){
    try{
        $userid=$_POST['userid'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $license=$_POST['licence'];

        $sql= "UPDATE users SET first_name = '$fname', last_name = '$lname', email = '$email', license_issued = '$license' WHERE id='$userid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
        // var_dump($result);
        if($result){
            header("Location: ../index.php");
        }
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else {
    header("Location: ../index.php");
}