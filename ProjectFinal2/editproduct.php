<head xmlns="http://www.w3.org/1999/html">
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

if(isset($_POST['edit'])){
    $publisher= $_POST['publisher'];
    $release_date = $_POST['release_date'];
    $description = $_POST['description'];
    $price = $_POST['final_price'];

    $sql = "UPDATE products SET publisher = '$publisher', release_date = '$release_date', description = '$description' WHERE ID = '$id'";

    $query = $conn->query($sql);

    header("location:productdetails.php?id=$id");
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
<form action="editproduct.php?id=<?=$id?>" method="post">
    <h2><?php echo $row['title_name']; ?></h2>

    <div class="productdetails">
        <div class="boxdetails">
            <img src="<?php echo $row['image'] ?>" alt="" style="text-align:center; border: solid 3px black; width: 350px; height: 376px; background-color: white; box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.5 ease-out;" width="" />
        </div>
        <div class="row">
            <label for="publisher">Publisher: </label>
            <input type="text" name="publisher" style="margin-top: 20px;" value="<?= $row['publisher'] ?>"/>
        </div>

        <div class="row">
            <label for="release_date">Release Date: </label>
            <input type="text" name="release_date" style="margin-top: 20px;" value="<?= $row['release_date'] ?>"/>
        </div>


            <div class="row">
                <label for="description">Description: </label>
                <textarea name="description" rows="7" cols="50" style="margin-top: 20px;"><?= $row['description'] ?></textarea>
            </div>


        <div class="row">
            <label for="final_price">Price: $</label>
            <input type="number" name="final_price" step="0.01" value="<?=$row['final_price']?>"/>
        </div>
    </div>

    </div>

        <div class="deal-button">
            <button type="submit" value="Change" class="site-button" name="edit">Submit Changes</button>
        </div>
    </form>


</section>
</body>

</html>
<?php
require_once("includes/footer.php")
?>
