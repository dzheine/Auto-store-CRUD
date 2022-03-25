
<?php

include("../layout/header.php");
require_once("../db_connect.php");

try{
    $userid=$_GET['userid'];
    $sql= "SELECT * 
    FROM cars
    JOIN users ON users.id=cars.user_id 
    WHERE users.id=$userid";
    $query=$conn->prepare($sql);
    $query->execute();
    $result= $query->fetchAll();
} catch(PDOException $e){
    echo "ERROR ". $e->getMessage;
}

//istraukiam, kiek masinu, kiek turi
try{
    $sql1="SELECT count(id) as count, id  FROM `cars` WHERE user_id=$userid";
    $query=$conn->prepare($sql1);
    $query->execute();
    $count= $query->fetch();
}catch(PDOException $e){
    echo "ERROR ". $e->getMessage;
}

// jei nera masinu:
if(empty($result)){
    echo "No cars available";
    die;
}
?>

<!-- kiek turi pasiulymu  -->
<nav class="navbar navbar-light bg-light justify-content-between">
    <span><?php echo $result[0]['first_name']." pasiulymai: ".$count['count'];?></span>
    <form class="form-inline" action="../views/car_add.php" method="GET">
        <input type="hidden" name="userid" value="<?php echo $userid;?>">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add new car</button>
    </form>
</nav>

<!-- atvaizduojamos turimos masinos -->
<div class="container py-4">
    <div class="row justify-content-center">
            <?php
            
            foreach($result as $k=>$info){
                echo "<div class='col-md-3'>
                        <div class='card'>
                            <div class='card-header bg-dark text-white'>
                                <i class='fa-solid fa-car-side'></i>
                            </div>
                            <div class='card-body'>
                                <p class='card-text'>". $info['brand']." ".$info['model']."</p>
                                <p class='card-text'> Color: ".$info['color']."</p>
                                <p>
                                    <form  action='./car_edit.php' method='GET'>
                                        <button class='btn btn-outline-white text-secondary' type='submit'><i class='fa-solid fa-pen-to-square'></i></button>
                                        <input type='hidden' name='carid' value=".$info['0'].">
                                        <input type='hidden' name='userid' value=".$userid.">
                                    </form>
                                    <form  action='../scripts/car_delete.php' method='POST'>
                                        <button class='btn btn-outline-white text-danger' type='submit'><i class='fa-solid fa-trash-can'></i></button>
                                        <input type='hidden' name='carid' value=".$info['0'].">
                                        <input type='hidden' name='userid' value=".$userid.">
                                    </form>
                                </p>
                            </div>
                        </div>
                        </div>";
            }
            ?>
    </div>
</div>