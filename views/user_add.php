<?php

include("../layout/header.php");
require_once("../db_connect.php");

?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">Please fill the required information</div>
                <div class="card-body">
                   <form action="../scripts/user_add.php" method="POST" >
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="First Name" name="fname">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Last Name" name="lname">
                        </div>
                        <div class="form-group my-3">
                            <input type="email" class="form-control" placeholder="Your@email.com" name="email">
                        </div>
                        <div class="form-group my-3">
                            <label class="my-3">Date your driving licence was issued</label>
                            <input type="date" class="form-control" name="licence">
                        </div>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
