<title>Retro Video Game Store: Retro Deals | Retro Games</title>
<?php
require_once('includes/database.php');
require_once('includes/header.php');

$sql = "SELECT *
FROM products 
WHERE deal_id = 1
ORDER BY title_name ASC";

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
<section class="main-section section-padding">
    <div class="page-navigation">
        <ul>
            <li class="page-navsli page-nav"><a href="index.php">Home</a></li>
            <li class="page-navsli page-nav">></li>
            <li class="page-navsli page-nav"><a href="deals.php">Retro Deals</a></li>
        </ul>
    </div>
    <div class="about-conent">
        <div class="heading product-category">
            All Retro Deals
        </div>
        <div class="product-section">
            <div class="product-side-bar">
                <ul class="side-bars">
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Price</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Platforms</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Availability</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Product Type</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">ESRB</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Players</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Review Stars</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Genre</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Condition</span><span
                                class="bar-icon">+</span></a></li>
                </ul>
            </div>
            <section class="new container" id="new">
                <!--Content-->
                <div class="new-content">
                    <!--Box 1-->

                    <?php
                    while ($row = $query->fetch_assoc()) {
                        echo "<section class=' new container' id='new'>";
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
    </div>
</section>
<?php
require_once('includes/footer.php');

?>
