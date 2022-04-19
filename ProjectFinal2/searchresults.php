<?php
require_once('includes/database.php');
require_once('includes/header.php');

//retrieve search term
if (filter_has_var(INPUT_GET, "terms")) {
    $terms_str = filter_input(INPUT_GET, 'terms', FILTER_SANITIZE_STRING);
} else {
    echo "There was not search terms found.";
    include('includes/footer.php');
    exit;
}

$terms = explode(" ", $terms_str);
//explode the search terms into an array

$sql = "SELECT * FROM products WHERE 1";
foreach ($terms as $term) {
    $sql .= " AND title_name LIKE '%$term%'";
}

$query = $conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg.";
    $conn->close();
    include('includes/footer.php');
    exit;
}


if ($query->num_rows == 0)
    echo "Your search <i>'$terms_str'</i> did not match any items in our inventory";
?>



<section class="main-section section-padding">
    <div class="page-navigation">
        <ul>
            <li class="page-navsli page-nav"><a href="index.php">Home</a></li>
            <li class="page-navsli page-nav">></li>
            <li class="page-navsli page-nav">Search Results</li>
        </ul>
    </div>
    <div class="about-content">
        <div class="heading product-category">
            <h2>Search Results for: '<?= $term ?>'</h2>
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
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Product
                                Type</span><span class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">ESRB</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Players</span><span
                                class="bar-icon">+</span></a></li>
                    <li class="single-bar"><a href="" class="bar-link"><span class="bar-text">Review
                                Stars</span><span class="bar-icon">+</span></a></li>
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
                        echo "<h3>$", $row['final_price'], "</h3>";
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



</body>



<script href="main.js"></script>
<?php
require_once('includes/footer.php');
?>
