<?php

include("../layout/header.php");
if(isset($_GET)){
    $userid=$_GET['userid'];
}

?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-warning" role="alert">
               <p>This user has no cars to show</p>
            </div>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 d-flex justify-content-between">
            <a class="btn btn-secondary" href="http://localhost/auto">Please check another user </a>
            <form class="form-inline" action="../views/car_add.php" method="POST">
                <input type="hidden" name="userid" value="<?php echo $userid;?>">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Add new car</button>
            </form>
        </div>

    </div>
</div>