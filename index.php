<?php
require_once("./db_connect.php");

try{
    $sql= "SELECT * FROM users";
    $query=$conn->prepare($sql);
    $query->execute();
    $result= $query->fetchAll();
} catch(PDOException $e){
    echo "ERROR ". $e->getMessage;
}
// var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Auto store</title>
</head>
<body>

<nav class="navbar navbar-light bg-dark">
  <span class="navbar-brand mb-0 h1 text-white">Welcome to the AUTO STORE!</span>
  <div class="form-inline my-2 my-lg-0">
</div>
</nav>
<nav class="navbar navbar-light bg-light justify-content-between">
    <span>Please choose the owner of the car to see the options:</span>
    <form class="form-inline" action="./views/user_add.php" method="POST">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add new user</button>
    </form>
</nav>
  
  <div class="table-responsive-sm" style="width: 50rem;">
<table class="table table-sm table-hover table-dark">
  <thead>
    <tr>
      <th scope="col-2">Name</th>
      <th scope="col-2">Last Name</th>
      <th scope="col-2">Email</th>
      <th scope="col-2"></th>
      <th scope="col-2"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($result as $user){
        echo "<tr>
        <td>".$user['first_name']."</td><td>".$user['last_name']."</td><td>".$user['email']."</td><td><a class='text-white mr-md-3' href='./views/cars.php?userid=".$user['id']."'>Check the cars</a></td><td><a href='./views/user_edit.php?userid=".$user['id']."'><i class='fa-solid fa-pen-to-square'></i></a><a href='./scripts/user_delete.php?userid=".$user['id']."'><i class='fa-solid fa-trash-can'></i></a></td></tr>";
    }
    ?>
  </tbody>
</table>
</div>

