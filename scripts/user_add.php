<?php

require_once("../db_connect.php");

//pasiimame duomenis is formos

if($_POST){
    // var_dump($_POST);
    if(!empty($_POST['fname']) && !empty($_POST['lname'])&& !empty($_POST['email']) && !empty($_POST['licence'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $licence=$_POST['licence'];
    } else{
        echo "Please fill the fields";
    }
} else{
    header("Location: ../views/user_add.php");
}

//jei viskas ok - keliame i DB

try{
    $sql = "INSERT INTO users (first_name, last_name, email, license_issued) VALUES ('$fname', '$lname', '$email', '$licence')";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: ../index.php");
} catch(PDOException $e){
    echo "Insert failed: ". $e->getMessage();
}