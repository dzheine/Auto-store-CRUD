<?php

include("../layout/header.php");
require_once("../db_connect.php");

if($_GET){
    $userid=$_GET['userid'];
    // var_dump($userid);
}
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">Please fill the required information</div>
                <div class="card-body">
                   <form action="../scripts/car_add.php" method="POST" >
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Car number" name="number">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Brand" name="brand">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Model" name="model">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Color" name="color">
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $userid;?>">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
