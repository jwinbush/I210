<head>
    <title>Retro Video Game Store: Buy & Sell | Retro Games</title>
</head>
<?php
require_once('includes/database.php');
require_once('includes/header.php');
//require_once ('includes/cookies.php');

$sql = "SELECT *
FROM products
WHERE id = 25 
OR id = 3
OR id = 26
OR id = 19
OR id = 21";

$query = $conn->query($sql);

if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Item not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>

<div class='back_color'>
    <div id="container">
        <header class='partone'>
            <h1></h1>

        </header>

        <div class="whole">
            <section class="main-section section-padding">
                <div class="content">
                    <div class="content-side right-side">
                        <div class="main-content">
                            <img height="400px" width="400px" src="images/favi.png" alt="">
                        </div>
                    </div>
                    <div class="content-side left-side">
                        <div class="main-section-title">
                            <h3 style='padding-top: 40px;' class="section-title">
                                <span>Retro Video </span>Game Store
                            </h3>
                        </div>
                        <div class="section-text">
                            Here at Retro Games we offer a vast selection of retro gaming items ranging from all systems
                            dating back to the 70’s including a number of games to go along with each console of choice.
                            Retro Games specializes in all forms of gaming, including old board games of pristine
                            condition, gaming collectibles including trading cards and action figures. Retro Games
                            offers fair prices compared to all other online competitors, and we even do price matching
                            to guarantee our customers get the best deals available.
                        </div>
                        <div class="shop">
                            NEW Games & Consoles Just Arrived Today - <a href="products.php"><span>SHOP NOW</span></a>!
                        </div>
                    </div>
                </div>
            </section>
            <div>
                <div class="section-title-div">
                    <span>Retro</span> Products
                    <!-- Moving banner -->
                    <?php
                    require_once('includes/banner.php')
                    ?>
                </div>

                <section class="new container" id="new">
                    <!--Content-->
                    <div class="new-content">
                        <!--Games Section-->
                        <div class="swiper-slide">
                            <div class="box-text">
                                <h4 style="font-size: 25px; text-align: center; color: black;">Video Games</h4>
                            </div>
                            <div class="box">
                                <a href='games.php'><img src="https://m.media-amazon.com/images/I/41Rp7kAm0JL.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                        <!--Consoles section-->
                        <div class="swiper-slide">
                            <div class="box-text">
                                <h4 style="font-size: 25px; text-align: center; color: black;">Consoles</h4>
                            </div>
                            <div class="box">
                                <a href='consoles.php'><img
                                        src="https://m.media-amazon.com/images/I/71GBvpBANFL._SL1500_.jpg" alt=""></a>
                            </div>
                        </div>
                        <!--Board Games section-->
                        <div class="swiper-slide">
                            <div class="box-text">
                                <h4 style="font-size: 25px; text-align: center; color: black;">Board Games</h2>
                            </div>
                            <div class="box">
                                <a href='boards.php'><img
                                        src="https://i.ebayimg.com/images/g/n2cAAOSwvmxci7ms/s-l500.jpg" alt=""></a>
                            </div>
                        </div>
                        <!--Collectible section-->
                        <div class="swiper-slide">
                            <div class="box-text">
                                <h4 style="font-size: 25px; text-align: center; color: black;">Collectibles</h4>
                            </div>
                            <div class="box">
                                <a href='collectibles.php'><img
                                        src="https://media.entertainmentearth.com/assets/images/37a7bd477a884a18975370d5db6a8300lg.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                </section>

            </div>
            <form action="products.php" method="get">
                <div class="deal-button" style="padding-top: 25px;">
                    <button type="submit" class="site-button">View All</button>
                </div>
            </form>
            <section class="deals-section section-padding">
                <div class="home-page-deals">
                    <div class="section-title-div">
                        <span>Retro</span> Deals
                    </div>


                    <section class="new container" id="new">
                        <!--Content-->
                        <div class="new-content">


                            <?php
                    while ($row = $query->fetch_assoc()) {
                        echo "<section class='new container' id='new'>";
                        echo "<div class='class='new-content'>";
                        echo "<div class='box'>";
                        echo "<div class='deal-image'>";
                        echo "<a href='productdetails.php?id=", $row['id'], "'> <img src='$row[image]' /></a>";
                        echo "<br>";
                        echo "<div class='box-text'>";
                        echo "<h2>", $row['title_name'], "</h2>";
                        echo "<h2>Publisher: ", $row['publisher'], "</h2>";
                        echo "<h3>", $row['product_category'], "</h3>";
                        echo "<span style= 'color: white; padding-right: 10px;' ><s>$", $row['first_price'], "</s></span> <span class='current-price'>$", $row['final_price'], "</span>";
                        echo "</div>";
                        echo "<div>";
                        echo "</div>";
                        echo "<div class='deal-review'>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</section>";
                    }
                    ?>
                        </div>


                </div>

            </section>

        </div>
        <div class="deal-button" style=" padding-bottom: 25px; background-color: white;">
            <form action="deals.php" method="get">
                <div>
                    <button type="submit" class="site-button">View All</button>
                </div>
            </form>
        </div>


        <script src="retrogame.js"></script>
        <?php
            require_once('includes/footer.php');
            ?>
