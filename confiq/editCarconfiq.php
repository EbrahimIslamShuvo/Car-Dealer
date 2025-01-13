<?php

require_once('conection.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $image= $_POST['image'];
    $name= $_POST['name'];
    $type = $_POST['type'];
    $model= $_POST['model'];
    $year= $_POST['year'];
    $fuel=$_POST['fuel'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
      
    if($con){
        $sql="UPDATE user SET image='$image', name='$name',type='$type',model='$model' ,year='$year',fuel='$fuel',price='$price',quantity='$quantity' WHERE (model='$model' || name='$name')";
        $result = mysqli_query($con, $sql);
        echo '<script>
        alert("Update successfully");
        window.location.href = "/CAR DEALER/car.php";
        </script>';
    }
    else{
        die(mysqli_error($con));
    }
}
?>