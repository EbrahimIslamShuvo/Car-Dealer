<?php 
require_once('confiq/conection.php');

if(isset($_GET['model'])) {
    $model = $_GET['model'];

    // Fetch user data from the database
    $u_sql = "SELECT * FROM car WHERE model=?";
    $u_stmt = mysqli_prepare($con, $u_sql);
    mysqli_stmt_bind_param($u_stmt, "s", $model);
    mysqli_stmt_execute($u_stmt);
    $u_result = mysqli_stmt_get_result($u_stmt);
    $u_row = mysqli_fetch_array($u_result, MYSQLI_ASSOC);
} else {
    // Redirect user if 'mail' parameter is not provided
    header("Location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Add Car || CAR DEALERSHIP</title>
</head>
<body>
    <!-- nav -->
    <div class="bg-white flex flex-col items-center text-gray-500">
        <img class="md:hidden" src="photo/logo.png" alt="">
        <div class="flex md:justify-between justify-center items-center w-9/12 m-auto gap-4">
            <div class="flex gap-4">
                <a href="index.php" class="hover:scale-110 hover:font-semibold hover:text-black">Home</a>
                <a href="shop.php" class="hover:scale-110 hover:font-semibold hover:text-black">Shop</a>
            </div>
            <img class="hidden md:block" src="photo/logo.png" alt="">
            <div class="flex gap-4">
                <a class="hover:scale-110 hover:font-semibold hover:text-black">Contact</a>
                <a class="hover:scale-110 hover:font-semibold hover:text-black">About Us</a>
                <a href="Customer.php" class="font-semibold text-black">Profile</a>
            </div>
        </div>
    </div>
    <!-- main -->
     <div class="flex flex-col relative">
        <img class="absolute -top-[245px] -z-20" src="photo/Ra.jpg" alt="">
        <form action="confiq/editCarconfiq.php" method="POST" enctype="multipart/form-data" class="sign-in-form flex flex-col items-center justify-center gap-4">
            <h2 class="text-[3em] text-white font-semibold">Edit Car Info</h2>
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['image']; ?>"  name="image" required placeholder="Enter Edited Image URL">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['name']; ?>"  name="name" required placeholder="Enter Edited Car Name">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['type']; ?>"  name="type" required placeholder="Enter Edited Car Type used/New">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['model']; ?>"  name="model" required placeholder="Enter Edited Car Model">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['year']; ?>"  name="year" required placeholder="Enter Edited Car Model Year">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['fuel']; ?>"  name="fuel" required placeholder="Enter Edited Car Fuel Type">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['price']; ?>"  name="price" required placeholder="Enter Edited Car Price">
            <input class="scale-110 shadow-sm px-10 py-2 rounded-full shadow-gray-500" type="text" value="<?php echo $u_row['quantity']; ?>"  name="quantity" required placeholder="Enter Edited Quantity">
            <div class="flex gap-8">
                <button class="bg-blue-500 text-white px-8  py-3 rounded-xl" type="submit" href="">Edit</button>
                <button class="bg-[#100E34] text-white px-5  py-3 rounded-xl" href="">Cencel</button>
            </div>
        </form>
                
     </div>

    <!-- footer -->
    <div class="flex flex-col md:flex-row md:justify-between md:w-9/12 m-auto items-center">
        <div class="flex flex-col items-center md:items-start gap-4  md:mt-14 mt-7">
            <h4 class="font-semibold">Subscribe To The Newsletter</h4>
            <div class="flex scale-x-125 border-4 py-2 px-4 rounded-full">
                <input type="email" placeholder="Enter Your Name">
                <p class="bg-red-700 text-white rounded-full px-3 py-2">></p>
            </div>
            <div class=" flex items-center gap-4 mb-8 md:0">
                <a href="#" class="fa fa-facebook bg-blue-500 hover:bg-blue-700 text-white py-3 px-4 rounded-full"></a>
                <a href="#" class="fa fa-twitter bg-blue-500 hover:bg-blue-700 text-white py-3 px-3 rounded-full"></a>
                <a href="#" class="fa fa-linkedin bg-blue-500 hover:bg-blue-700 text-white py-3 px-3 rounded-full"></a>
            </div>
        </div>
        <div class="flex justify-between p-8 md:p- pt-0 w-11/12 md:w-6/12 text-gray-500">
            <div class="flex flex-col gap-4">
                <h3 class="text-black font-bold">Buying & Selling</h3>
                <div class="">
                    <p>Find A Car</p>
                    <p>Listings By City</p>
                    <p>Sell Your Car</p>
                    <p>Compae Side by Side</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="text-black font-bold">Resource</h3>
                <div class="">
                    <p>Blog</p>
                    <p>Guides</p>
                    <p>FAQ</p>
                    <p>Help Center</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="text-black font-bold">Company</h3>
                <div class="">
                    <p>Company</p>
                    <p>Career</p>
                    <p>Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- lower footer -->
    <div class="">
        <div class="text-gray-500 px-4 flex flex-col items-center md:flex-row md:justify-between md:w-9/12 m-auto md:p-4 ">
            <div class="">
                <p>© 2023 Car Leadership</p>
            </div>
            <div class="flex justify-between md:gap-14">
                <p>Terms of Service</p>
                <p>Privacy Policy</p>
                <p>Trust & Safety</p>
                <p>Law Enforcement</p>
            </div>
            <div class="flex gap-2">
                <p>Develop By: </p>
                <a href="https://www.facebook.com/ebrahim.islam.2003">M.Ebrahim Islam Shuvo</a>
            </div>
        </div>
    </div>
</body>
</html>