<head xmlns="http://www.w3.org/1999/html">
    <title>Retro Video Game Store: Product Details | Retro Games</title>
</head>
<?php
require_once('includes/database.php');
require_once('includes/header.php');


if(isset($_POST['create'])){
    $title = $_POST['title'];
    $publisher= $_POST['publisher'];
    $release_date = $_POST['release_date'];
    $description = $_POST['description'];
    $final_price = $_POST['final_price'];
    $first_price = $_POST['final_price'];
    $image = "https://upload.wikimedia.org/wikipedia/commons/3/3f/Placeholder_view_vector.svg";
    $category_id = 1;
    $deal_id = 1;
    $product_category = $_POST['product_category'];
    $publisher_id = 1;

    $sql = "INSERT INTO products (title_name, description, release_date, first_price, final_price, image, category_id, deal_id, product_category, publisher, publisher_id) VALUES ('$title', '$description', '$release_date', $first_price, $final_price, '$image', $category_id, $deal_id, '$product_category', '$publisher', $publisher_id)";

    $query = $conn->query($sql);
    $id = $conn->insert_id;

    header("location:productdetails.php?id=$id");
}

?>

<section class="main-section section-padding">
    <div class="page-navigation">
        <ul>
            <li class="page-navsli page-nav"><a href="index.php">Home</a></li>
            <li class="page-navsli page-nav">></li>
            <li class="page-navsli page-nav">Add Product</li>
        </ul>
    </div>
    <form action="addproduct.php" method="post">
        <h2>Create a Product</h2>

        <div class="productdetails">

            <div class="row">
                <label for="title">Title: </label>
                <input type="text" name="title" style="margin-top: 20px;" value=""/>
            </div>

            <div class="row">
                <label for="publisher">Publisher</label>
                <select name="publisher">
                    <option value="Nintendo">Nintendo</option>
                    <option value="Sony">Sony</option>
                    <option value="Hasbro">Hasbro</option>
                    <option value="Kenner">Kenner</option>
                    <option value="Marvel">Marvel</option>
                    <option value="Midway">Midway</option>
                    <option value="Star Wars">Star Wars</option>
                    <option value="TSR Inc.">TSR Inc.</option>
                    <option value="Atari Inc.">Atari Inc.</option>
                    <option value="Microsoft">Microsoft</option>
                </select>
            </div>

            <div class="row">
                <label for="release_date">Release Date: </label>
                <input type="date" name="release_date" style="margin-top: 20px;" value=""/>
            </div>


            <div class="row">
                <label for="description">Description: </label>
                <textarea name="description" rows="7" cols="50" style="margin-top: 20px;"></textarea>
            </div>


            <div class="row">
                <label for="final_price">Price: $</label>
                <input type="number" name="final_price" step="0.01" value=""/>
            </div>

            <div class="row">
                <label for="product_category">Category</label>
                <select name="product_category">
                    <option value="Video Game">Video Game</option>
                    <option value="Console">Console</option>
                    <option value="Board Game">Board Game</option>
                    <option value="Collectible">Collectible</option>
                </select>
            </div>


        </div>

        </div>

        <div class="deal-button">
            <button type="submit" value="Change" class="site-button" name="create">Add Product</button>
        </div>
    </form>


</section>
</body>

</html>
<?php
require_once("includes/footer.php")
?>
?>