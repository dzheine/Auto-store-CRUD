<?php
include("../layout/header.php");
require_once("../db_connect.php");

//susirenkame duomenis redagavimui is DB

if(isset($_GET)){

    try{
     $userid=$_GET['userid'];

    // var_dump($userid);
    $sql= "SELECT * FROM users WHERE id='$userid'";
    $query=$conn->prepare($sql);
    $query->execute();
    $result=$query->fetch();
    // var_dump($result);
    }catch(PDOException $e){
        echo "failed: ". $e->getMessage();
    }
}

?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">You can correct here</div>
                <div class="card-body">
                   <form action="../scripts/user_edit.php" method="POST" >
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $result['first_name'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $result['last_name'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="email" class="form-control" placeholder="Your@email.com" name="email" value="<?php echo $result['email'];?>">
                        </div>
                        <div class="form-group my-3">
                            <label class="my-3">Date your driving licence was issued</label>
                            <input type="date" class="form-control" name="licence" value="<?php echo $result['license_issued'];?>">
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $result['id'];?>">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

