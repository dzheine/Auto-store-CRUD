<!-- 3. Paspaudus ant savininko turi perkelti į kitą puslapį ir jame atvaizduoti visus jo turimus automobilius.
4. Automobilių puslapyje turi būti galimybė pridėti naują automobilį ir jis automatiškai turi būti priskiriamas tam savininkui. 
Taip pat turi būti galimybė redaguoti ir ištrinti automobilius.
5. Front-end pagal nuožiūrą. -->

<!-- KAIP POST IS GET PADARYTI LENTELEJE< KAD NEREIKTU PER PUSLAPIUS GRAZINTI< KD PRADETU NUO NULIO -->

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
//  print_r($result);
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
//var_dump($count);
?>


<nav class="navbar navbar-light bg-light justify-content-between">
    <span><?php echo $result[0]['first_name']." pasiulymai: ".$count['count'];?></span>
    <form class="form-inline" action="../views/car_add.php" method="POST">
        <input type="hidden" name="userid" value="<?php echo $userid;?>">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add new car</button>
    </form>
</nav>

<div class="container py-4">
    <div class="row justify-content-center">
            <?php
            if(empty($result)){
                header("Location: notavailable.php?userid=$userid");
            }else{
            foreach($result as $k=>$info){
                echo "<div class='col-md-3'><div class='card'><div class='card-header bg-dark text-white'><i class='fa-solid fa-car-side'></i></div><div class='card-body'><p class='card-text'>". $info['brand']." ".$info['model']."</p><p class='card-text'> Color: ".$info['color']."</p><p><a href='./car_edit.php?carid=".$info['0']."'><i class='fa-solid fa-pen-to-square text-secondary '></i></a><a href='../scripts/car_delete.php?carid=".$info['0']."'><i class='fa-solid fa-trash-can text-danger'></i></a></div></div></div>";
            }}
            ?>
       
    </div>
</div>