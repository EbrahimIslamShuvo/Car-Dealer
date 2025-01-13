<?php
require_once('conection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $customer_name = $_POST['name'];
    $customer_number = $_POST['number'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    $car_name = $_POST['cname'];
    $car_type = $_POST['ctype'];
    $car_model = $_POST['cmodel'];
    $car_year = $_POST['cyear'];
    $car_fuel = $_POST['cfuel'];
    $car_price = $_POST['cprice'];

    if ($con) {
        // Insert data into the 'sell' table
        $sql = "INSERT INTO sell (customer_name, customer_number, customer_email, customer_address, car_name, car_type, car_model, car_year, car_fuel, car_price) 
                VALUES ('$customer_name', '$customer_number', '$customer_email', '$customer_address', '$car_name', '$car_type', '$car_model', '$car_year', '$car_fuel', '$car_price')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Retrieve all records from the 'car' table
            $sql1 = "SELECT * FROM car";
            $result1 = $con->query($sql1);
            $row = $result1->fetch_assoc();

            // Update the car quantity
            $sql2 = "UPDATE car SET quantity = (quantity - 1) WHERE model = '$car_model'";
            $update_result = $con->query($sql2);

            echo '<script>
                alert("New account created successfully");
                window.location.href = "/CAR DEALER/index.php";
            </script>';
        } else {
            echo '<script>
                alert("An error occurred");
                window.location.href = "/CAR DEALER/shop.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("Database connection error");
            window.location.href = "/CAR DEALER/login.php";
        </script>';
    }
} else {
    die(mysqli_error($con));
}
?>
