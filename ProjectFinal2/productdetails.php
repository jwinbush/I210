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


if(isset($_GET['edit'])){
    header("location: editproduct.php?id=$id");
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
    <?php
    if(isset($_GET['cart'])){
        if (array_key_exists($id, $cartArray)) {
            $cartArray[$id] = $cartArray[$id] + 1;
        } else {
            $cartArray[$id] = 1;
        }

        $_SESSION['cart'] = $cartArray;
        echo '<h2 style="color: #0ca845;">Item successfully added to cart</h2>';

    }
    ?>
    <h2><?= $row['title_name'] ?></h2>

    <div class="productdetails">
        <div class="boxdetails">
            <img src="<?php echo $row['image'] ?>" alt="" style="text-align:center; border: solid 3px black; width: 350px; height: 376px; background-color: white; box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.5 ease-out;" width="" />
        </div>
        <div class="column" color="black";>
            <div style="padding-top: 20px;">Publisher: <?= $row['publisher'] ?></div>
            <div>Release Date: <?= $row['release_date'] ?></div>
            <div>Description: <?= $row['description'] ?></div>
            <div>$<?= $row['final_price'] ?></div>

        </div>

    </div>

    <form action="productDetails.php" method="get">
        <input type="hidden" name="id" value="<?php print $row['id'];?>">
        <div class="deal-button">
            <button type="submit" value="Add" class="site-button" name="cart">Add to Cart</button>
        </div>
        <?php
        if($isAdmin == 1) {
            echo
            '<div class="deal-button">
            <button type="submit" value="Edit" class="site-button" name="edit">Edit Product</button>
        </div>';
        }
        ?>
    </form>


</section>
</body>

</html>
<?php
require_once("includes/footer.php")
?>
