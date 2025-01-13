<?php

require_once('conection.php');
$_SERVER['REQUEST_METHOD']='POST';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username= $_POST['name'];
    $usernumber = $_POST['number'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $user_type="customer";
      
    if($con){
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($con ,$query); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==0){
            $sql="insert into user (name,number,email,password,type) values ('$username','$usernumber','$email','$password','$user_type')";
            $result=mysqli_query($con,$sql);
        
            if($result){
                echo '<script>
                    alert("New account created successfully");
                    window.location.href = "/CAR DEALER/login.php";
                </script>';

            }
            else{
                echo '<script>
                    alert("An error accour");
                    window.location.href = "\CAR DEALER\login.php";
                </script>';
            }
        }
        else{
            echo '<script>
                alert("You already have an account using this email.");
                window.location.href = "/CAR DEALER/login.php";
            </script>';

        }
    }
    else{
        die(mysqli_error($con));
    }
}
?>