<?php
require_once('includes/database.php');
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_POST['clear'])){
    unset($_SESSION['cart']);
    $cartCount = 0;
}

if (isset($_SESSION['cart'])) {
    $cartArray = $_SESSION['cart'];
} else {
    $cartArray = array();
}

if (isset($_SESSION['FirstName'])){
    $firstName = $_SESSION['FirstName'];
}


if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM users WHERE ID = $uid";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
}
    if($row['Admin'] == "1") {
       $isAdmin = 1;
    }

//variables for a user's login, name, and role
$login = ' ';
    $name = ' ';
    $role = 0;

    //if the use has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND
isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--Font Awesome Link-->
    <script src="https://kit.fontawesome.com/f0d9672994.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon Links-->
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!--Google Font Link-->
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <!--Css-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/swiper-bundle-min.css">
</head>

<body>
    <?php
        if($isAdmin == 1){
            include 'includes/adminBanner.php';
        }
    ?>
    <div id="heading">
        <!--Free shipping-->
        <p class=" welcome"><a href="register.php"><i class="fa-solid fa-truck-fast"></i> FREE STANDARD SHIPPING &
                RETURNS |
                JOIN NOW</a></p>
        <header style=" box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.2);" class="header">
            <!--Navigation-->
            <div class="site-navigation">
                <ul class="site-navs">
                    <div class=site-logo align=center>
                        <!--Logo-->
                        <a href="index.php"><img src="images/retrologo.png"></a>
                    </div>
                    <!--Navigation Dropdowns-->
                    <li class="navs"><a href="index.php">Home</a></li>
                    <?php
                        if ($isAdmin == 1){
                            echo '<li class="navs"><a href="addproduct.php">Add a Product</a></li>';
                        }
                    ?>
                    <div class="dropdown" class="navs">
                        <li class="dropbtn">Products </li>
                        <div class="dropdown-content">
                            <a href="products.php">All Products</a>
                            <a href="games.php">Video Games</a>
                            <a href="consoles.php">Consoles </a>
                            <a href="boards.php">Board Games</a>
                            <a href="collectibles.php">Collectibles</a>
                        </div>
                    </div>
                    <div class="dropdown" class="navs">
                        <li class="dropbtn"><a href="deals.php">Retro Deals <i class="fa-solid fa-fire"></i></a></li>
                    </div>
                    <div class="dropdown" class="navs">
                        <li class="dropbtn">About Us</li>
                        <div class="dropdown-content">
                            <a href="about.php">Our Team <i class="fa-solid fa-people-group"></i></a>
                        </div>
                    </div>
                    <div class="dropdown" class="navs">

                        <?php
                            if (isset($_SESSION["uid"])){
                                echo '<li class="dropbtn">'. $firstName . '<i class="fa fa-user"></i></li>
                                <div class="dropdown-content">
                                <a href="logout.php">Log Out</a>
                                <a href="edituser.php">Edit User Account</a>';
                                if($isAdmin == 1){
                                    echo ' <a href="createAdmin.php">Create an Admin Account</a>';
                                }
                                 echo '</div>';
                            }
                            else{
                                echo '<li class="dropbtn">Account <i class="fa fa-user"></i></li>
                                <div class="dropdown-content">
                                <a href="signin.php">Sign In</a>
                                <a href="register.php">Create Account</a>
                                </div>';
                            }
                        ?>

                    </div>
                    <!--Cart-->
                    <div class="dropdown" class="navs">
                        <li class="dropbtn"><a class="fa-solid fa-cart-shopping" href="cart.php"></a>
                            <?php
                                if(!empty($cartArray)) {
                                    $cartCount = array_sum($cartArray);
                                    echo "(" . $cartCount . ")";
                                }
                            ?>

                        </li>
                    </div>
                    <!--Search bar-->
                    <ul class="navs" class="nav">
                        <li id="search">
                            <form action=" searchresults.php" method="get">
                                <input type="text" name="terms" size="20" required />&nbsp;&nbsp;
                                <button id="btnsearch" type=" submit" name="Submit" value="
                                    Search"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                    </ul>

                    <!--Navigation-->
                    <script src="prefixfree-1.0.7.js" type="text/javascript"></script>

                </ul>
            </div>
        </header>
        <br>
    </div>
