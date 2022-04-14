<head>
    <title>Retro Video Game Store: Product Details | Retro Games</title>
</head>
<?php
require_once('includes/database.php');
require_once('includes/header.php');

if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving
 item id.";
    $conn->close();
    die();
}

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT *
 FROM products
 WHERE id=$id";

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
            <li class="page-navsli page-nav"><a href="products.php">Products</a></li>
            <li class="page-navsli page-nav">></li>
            <li class="page-navsli page-nav">Product Details</li>
        </ul>
    </div>

    <h2><?= $row['title_name'] ?></h2>

    <div class="productdetails">
        <div class="detailimage">
            <img src="<?php echo $row['image'] ?>" alt="" style="text-align:center; border: solid 3px black;  background-color: white; box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.5 ease-out;" width="600" />
        </div>
        <div class="column">
            <div style="padding-top: 20px;">Publisher: <?= $row['publisher'] ?></div>
            <div>Release Date: <?= $row['release_date'] ?></div>
            <div>$<?= $row['final_price'] ?></div>
            <div>Description: <?= $row['description'] ?></div>
        </div>

    </div>

    <?php
    /*
    $confirm = "";
    if (isset($_GET['m'])) {
        if ($_GET['m'] == "insert") {
            $confirm = "You have successfully added the new item.";
        }
    } else if ($_GET['m'] == "update") {
        $confirm = "Your item has been successfully updated.";
    }
    */
    ?>


    <form action="addproduct.php" method="get">
        <div class="deal-button">
            <button type="submit" value="Add" class="site-button">Add to Cart</button>
        </div>
    </form>


</section>
</body>

</html>
<?php
require_once("includes/footer.php")
?>