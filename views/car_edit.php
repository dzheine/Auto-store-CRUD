<?php

include("../layout/header.php");
require_once("../db_connect.php");

if(isset($_GET)){
    try{
        $carid = $_GET['carid'];
        $sql= "SELECT * From cars WHERE id= '$carid'";
        $query = $conn->prepare($sql);
        $query->execute();
        $result= $query->fetch();
        //    var_dump($result);
            $userid=$result['user_id'];
    }catch(PDOExeption $e){
        echo "Failed: ". $e->getMessage();
    }
}

?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">Please edit the required information</div>
                <div class="card-body">
                   <form action="../scripts/car_edit.php" method="POST">
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Car number" name="number" value="<?php echo $result['number'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Brand" name="brand" value="<?php echo $result['brand'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Model" name="model" value="<?php echo $result['model'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Color" name="color" value="<?php echo $result['color'];?>">
                        </div>
                            <input type="hidden" name="userid" value="<?php echo $userid;?>">
                            <input type="hidden" name="carid" value="<?php echo $carid;?>">
                        <input type="submit" name="submit" class="btn btn-secondary" value="submit">
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>