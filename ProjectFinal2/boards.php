<title>Retro Video Game Store: Board Games | Retro Games</title>
<?php
require_once('includes/database.php');
require_once('includes/header.php');

$sql = "SELECT *
FROM products 
WHERE category_id = 3
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
            <li class="page-navsli page-nav"><a href="boards.php">Board Games</a></li>
        </ul>
    </div>
    <div class="about-conent">
        <div class="heading product-category">
            All Board Games
        </div>
        <div class="product-section">
            <div class="product-side-bar">
                <ul class="side-bars">
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Price</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Platforms</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Availability</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Product Type</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">ESRB</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Players</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Review Stars</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Genre</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Condition</span><span class="bar-icon">+</span></a></li>
                </ul>
            </div>
            <?php
            while ($row = $query->fetch_assoc()) {
                echo "<div class='all-deals'>";
                echo "<div class='dealone' class='single-deal'>";
                echo "<div class='deal-outer'>";
                echo "<div class='deal-image'>";
                echo "<a href='productdetails.php?id=", $row['id'], "'> <img src='$row[image]' height='230' /></a>";
                echo "<br>";
                echo "<div class='deal-title'>";
                echo "<p>", $row['title_name'], "</p>";
                echo "<p>Platform: ", $row['publisher'], "</p>";
                echo "<p>", $row['product_category'], "</p>";
                echo "</div>";
                echo "<div class='deal-price'>";
                echo "<span>$", $row['final_price'], "</span>";
                echo "</div>";
                echo "<div class='deal-stars'>";
                echo "</div>";
                echo "<div class='deal-review'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</section>
<?php
require_once('includes/footer.php');

?>