<?php
    require_once("confiq\conection.php");
$sql = "SELECT * FROM car";
$result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Shop || CAR DEALERSHIP</title>
</head>
<body>
    <!-- nav -->
    <div class="flex flex-col items-center text-gray-500">
        <img class="md:hidden" src="photo/logo.png" alt="">
        <div class="flex md:justify-between justify-center items-center w-9/12 m-auto gap-4">
            <div class="flex gap-4">
                <a href="index.php" class="hover:scale-110 hover:font-semibold hover:text-black">Home</a>
                <a href="shop.php" class="font-semibold text-black">Shop</a>
            </div>
            <img class="hidden md:block" src="photo/logo.png" alt="">
            <div class="flex gap-4">
                <a class="hover:scale-110 hover:font-semibold hover:text-black">Contact</a>
                <a class="hover:scale-110 hover:font-semibold hover:text-black">About Us</a>
                <a href="login.php" class="hover:scale-110 hover:font-semibold hover:text-black">Profile</a>
            </div>
        </div>
    </div>
    <!-- hero -->
    <div class="flex flex-col items-center">
        <p class="text-[3em] font-semibold">Car Showcase</p>
        <div class="flex items-center px-1 md:px-3 md:py-3  text-gray-500 rounded-full shadow-gray-600 shadow-xl py-1 gap-1">
            <p class="bg-[#A2001D] text-white rounded-full py-2 px-3">Cars & minivan</p>
            <p class="hover:bg-gray-100 hover:text-black rounded-full py-2 px-3">Trucks</p>
            <p class="hover:bg-gray-100 hover:text-black rounded-full py-2 px-3">Crossovers & SUVs</p>
            <p class="hover:bg-gray-100 hover:text-black rounded-full py-2 px-3">Electrified</p>
        </div>
        <div class="grid grid-cols-1 items-center md:grid-cols-3 md:justify-between w-9/12 m-auto gap-8">
                <?php 
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="flex items-center mt-10 hover:scale-110">
                        <div class="w-[50%] -mr-[60px]">
                            <img class=" relative z-20" src="<?php echo $row['image']?>" alt="">
                        </div>
                        <div class="w-[60%] h-[220px] bg-white p-3 rounded-lg mb-16">
                            <h4><?php echo $row['name']?></h4>
                            <p><?php echo $row['type']?></p>
                            <div class="w-8/12 m-auto mr-0 gap-2">
                                <div class="flex justify-between">
                                    <div class="">
                                        <p>Model Year</p>
                                        <p>Model</p>
                                        <p>Fuel</p>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        <p><?php echo $row['year']?></p>
                                        <p><?php echo $row['model']?></p>
                                        <p><?php echo $row['fuel']?></p>
                                    </div>
                                </div>
                                <p class="font-semibold text-[1em] py-2"><?php echo $row['price']?></p>
                                <?php
                                if($row['quantity'] >0 ){
                                    ?>
                                    <a href="payment.php?model=<?php echo urlencode($row['model']); ?>" class="btn btn-primary"><button class="bg-[#100E34] text-white px-5 py-1 rounded-2xl w-full">Order Now</button></a>
                                    <?php
                                }else{
                                    ?>
                                    <button class="bg-[#34307a] text-white text-[.9em] px-5 py-1 rounded-2xl w-full" disabled>Out of Stock</button>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                ?>
        </div>
    </div>
    <!-- footer -->
    <div class="flex flex-col md:flex-row md:justify-between md:w-9/12 m-auto items-center">
        <div class="flex flex-col items-center md:items-start gap-4  md:mt-14 mt-7">
            <h4 class="font-semibold">Subscribe To The Newsletter</h4>
            <div class="flex scale-x-125 border-2 rounded-full">
                <input class="rounded-l-full pl-3" type="email" placeholder="Enter Your Email">
                <img class="p-3 bg-orange-500 rounded-r-full" src="photo/arrow-right-white.png" alt="">
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