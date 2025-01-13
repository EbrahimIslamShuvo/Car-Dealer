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
    <title> HOME || CAR DEALERSHIP</title>
</head>
<body>
    <!-- nav -->
    <div class="flex flex-col items-center text-gray-500">
        <img class="md:hidden" src="photo/logo.png" alt="">
        <div class="flex md:justify-between justify-center items-center w-9/12 m-auto gap-4">
            <div class="flex gap-4">
                <a href="index.php" class="font-semibold text-black">Home</a>
                <a href="shop.php" class="hover:scale-110 hover:font-semibold hover:text-black">Shop</a>
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
    <div class="relative">
        <div class="flex w-full justify-center pt-8">
            <img class="absolute -z-10" src="photo/Audi.png" alt="">
        </div>
            
        <div class="flex flex-col md:flex-row md:items-center md:justify-between md:w-9/12 m-auto">
            <div class="flex flex-col items-center">
                <h4 class="text-[2.75em] font-bold">Find Your Dream</h4>
                <div class="flex md:flex-col lg:flex-row gap-24 items-center">
                    <h2 class="text-[5em] text-red-800 font-bold">CAR</h2>
                    <button class="bg-[#100E34] text-white px-5  py-3 rounded-full">Order Now ></button>
                </div>
            </div>
            <img class="pt-4" src="photo/car1.png" alt="">
        </div>
    </div>
    <!-- brand -->
    <div class="flex flex-col w-9/12 m-auto ">
        <h3 class="text-center text-[3em] font-semibold">----BRAND----</h3>
        <div class="flex items-center w-full justify-center gap-10 overflow-x-scroll lg:overflow-hidden">
            <img src="photo/Component 2.png" alt="">
            <img src="photo/Component 3.png" alt="">
            <img src="photo/Component 4.png" alt="">
            <img src="photo/Component 5.png" alt="">
            <img src="photo/Component 1.png" alt="">
        </div>
    </div>
    <!-- cart -->
    <div class="bg-[#EAEBF0] my-14">
        <div class="flex flex-col items-center md:w-9/12 m-auto">
            <h2 class="text-[3em] font-semibold">---Explore---</h2>
            <div class="flex items-center px-1 md:px-3 md:py-3  text-gray-500 rounded-full shadow-gray-600 shadow-xl py-1 gap-1">
                <p class="bg-[#A2001D] text-white rounded-full py-2 px-3">Cars & minivan</p>
                <p class="hover:bg-gray-100 hover:text-black rounded-full py-2 px-3">Trucks</p>
                <p class="hover:bg-gray-100 hover:text-black rounded-full py-2 px-3">Crossovers & SUVs</p>
                <p class="hover:bg-gray-100 hover:text-black rounded-full py-2 px-3">Electrified</p>
            </div>
            <!-- cart list -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
                $cnt = 0;
                while ($row = mysqli_fetch_array($result)) {
                    if ($cnt >= 3) break; 
                    $cnt++;
                    ?>
                    <div class="flex items-center mt-10 hover:scale-110">
                        <div class="w-[50%] -mr-[60px]">
                            <img class=" relative z-20" src="<?php echo $row['image']?>" alt="">
                        </div>
                        <div class="w-[60%] h-[250px] bg-white p-3 rounded-lg mb-16">
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
                                <p class="font-semibold text-[1em] py-2">$<?php echo $row['price']?></p>
                                <?php
                                if($row['quantity'] >0 ){
                                    ?>
                                    <a href="payment.php?model=<?php echo urlencode($row['model']); ?>" class="btn btn-primary"><button class="bg-[#100E34] text-white px-5 py-1 rounded-2xl w-full">Order Now</button></a>
                                    <?php
                                }else{
                                    ?>
                                    <button class="bg-[#100E34] text-white text-[.9em] px-5 py-1 rounded-2xl w-full" disabled>Out of Stock</button>
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
            <!-- see_more -->
            <div class="flex w-full justify-end p-4">
                <a class="hover:scale-110 hover:font-semibold hover:text-black" href="shop.php">See More ></a>
            </div>
        </div>
    </div>
    <!-- Services -->
    <div class="flex flex-col items-center gap-4 my-14">
        <h2 class="text-[3em] font-semibold">OUR SERVICES</h2>
        <h4 class="text-[.8em] text-gray-500">we Provide many of the best servises for you  and you will get the best benefits here</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-0 md:justify-between w-8/12">
            <div class="shadow-gray-500 shadow-lg w-9/12 md:w-9/12 m-auto p-4 flex flex-col items-start gap-4 rounded-lg">
                <img src="photo/car.png" alt="">
                <h4 class="font-bold">Top Buy & sell Car</h4>
                <p class="text-gray-500">we Provide many of the best servises for you and you will get the best benefits here</p>
            </div>
            <div class="shadow-gray-500 shadow-lg w-9/12 md:w-9/12 m-auto p-4 flex flex-col items-start gap-4 rounded-lg">
                <img src="photo/wallet.png" alt="">
                <h4 class="font-bold">Top Easy payment</h4>
                <p class="text-gray-500">we Provide many of the best servises for you and you will get the best benefits here</p>
            </div>
            <div class="shadow-gray-500 shadow-lg w-9/12 md:w-9/12 m-auto p-4 flex flex-col items-start gap-4 rounded-lg">
                <img src="photo/bus.png" alt="">
                <h4 class="font-bold">Easy to use</h4>
                <p class="text-gray-500">we Provide many of the best servises for you and you will get the best benefits here</p>
            </div>
        </div>
    </div>
    <!-- Read -->
    <div class="flex flex-col md:flex-row items-center">
        <div class="">
            <img src="photo/car5.png" alt="">
        </div>
        <div class="p-16 flex flex-col gap-3 items-start">
            <h4 class="text-3xl font-bold text-[#100E34]">EVs for everyone</h4>
            <p class="text-gray-500 md:w-8/12">we Provide many of the best servises for you  and you will get the best benefits here </p>
            <button class="bg-[#100E34] text-white px-5  py-3 rounded-full">Read more ></button>
        </div>
    </div>
    <!-- customer review -->
    <div class="mb-14 flex flex-col gap-4 md:my-14">
        <h2 class="text-center text-[3em] font-semibold">Our Customer Feedback</h2>
        <div class="flex flex-col lg:flex-row w-10/12 lg:w-9/12 m-auto gap-6 items-center text-gray-500">
            <div class="flex flex-col w-10/12 gap-3 p-6 m-auto shadow-lg shadow-gray-500">
                <div class="flex items-center gap-3">
                    <img src="photo/customer1.png" alt="">
                    <div class="">
                        <p class="text-black font-semibold">Órlaith Parastu</p>
                        <p>Bought Tesla Model 3  </p>
                    </div>
                </div>
                <p>The listing was hot (more than 170 bids). Everything worked well. We appreciated a simple process.Listing page, chat with a seller, the auction, escrow service – everything was great and we didn’t need anything on top.</p>
            </div>
            <div class="flex flex-col w-10/12 gap-3 p-6 m-auto shadow-lg shadow-gray-500 lg:translate-y-9">
                <div class="flex items-center gap-3">
                    <img src="photo/customer2.png" alt="">
                    <div class="">
                        <p class="text-black font-semibold">Melina Nesterenko </p>
                        <p>Bought Tesla Model 3  </p>
                    </div>
                </div>
                <p>The listing was hot (more than 170 bids). Everything worked well. We appreciated a simple process.Listing page, chat with a seller, the auction, escrow service – everything was great and we didn’t need anything on top.</p>
            </div>
            <div class="flex flex-col w-10/12 gap-3 p-6 m-auto shadow-lg shadow-gray-500">
                <div class="flex items-center gap-3">
                    <img src="photo/customer3.png" alt="">
                    <div class="">
                        <p class="text-black font-semibold">Eve Artie</p>
                        <p>Bought Tesla Model 3  </p>
                    </div>
                </div>
                <p>The listing was hot (more than 170 bids). Everything worked well. We appreciated a simple process.Listing page, chat with a seller, the auction, escrow service – everything was great and we didn’t need anything on top.</p>
            </div>
        </div>
    </div>
    <!-- blog -->
     <div class="bg-[#EAEBF0] flex flex-col items-center gap-4 md:mt-24 md:pb-16 pb-4">
        <h3 class="text-[3em] font-semibold">Blog</h3>
        <div class="flex flex-col items-center md:flex-row md:justify-between md:w-9/12 m-auto gap-4">
            <div class="flex flex-col items-center w-9/12 m-auto md:translate-y-9">
                <img src="photo/blog1.png" alt="">
                <p class="bg-white p-6 rounded-3xl -mt-10">Compact Steamroller: 2024 Toyota RAV4 Starts at $29,825</p>
            </div>
            <div class="flex flex-col items-center w-9/12 m-auto">
                <img src="photo/blog2.png" alt="">
                <p class="bg-white p-6 rounded-3xl -mt-10">2024 Kia Niro EV Costs $50 More, Nearly Unchanged Otherwise</p>
            </div>
            <div class="flex flex-col items-center w-9/12 m-auto md:translate-y-9">
                <img src="photo/blog3.png" alt="">
                <p class="bg-white p-6 rounded-3xl -mt-10">Is the 2024 Porsche Cayenne S a Good SUV? 4 Pros and 3 Cons</p>
            </div>
        </div>
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