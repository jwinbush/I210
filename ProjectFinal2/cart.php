<head><title>Retro Video Game Store: Cart | Retro Games</title></head>
<?php
require_once('includes/database.php');
require_once('includes/header.php');

if(isset($_POST['clear'])){
    unset($_SESSION['cart']);
    $cartCount = 0;
}


if(isset($_SESSION['cart'])) {
    $cartArray = $_SESSION['cart'];
    $cartCount = array_sum($cartArray);
}

?>
    <section class="main-section section-padding">
        <div class="page-navigation">
        <ul>
                <li class="page-navsli page-nav"><a href="index.php">Home</a></li>
                <li class="page-navsli page-nav">></li>
                <li class="page-navsli page-nav"><a href = "cart.php">Your Cart</a></li>
            </ul>
        </div>
        <div class="about-conent">
            <div class="heading">
                YOUR CART (<?php echo $cartCount;?> ITEMS)
            </div>

            <!--Clear cart -->
                <form action="cart.php" method="post">
                <div class="deal-button">
                    <button type="submit" value="Clear" class="site-button" name="clear">Clear Cart</button>
                </div>
            </form>


            <div class="about-text">
                <?php
                if(!isset($_POST['clear'])){
                //select statement
                $sql = "SELECT id, title_name, final_price, image FROM products WHERE 0";
                foreach (array_keys($cartArray) as $id) {
                    $sql .= " OR id=$id";
                }

                //execute the query
                $query = $conn->query($sql);

                //fetch items
                while ($row = $query->fetch_assoc()) {
                    $image = $row['image'];
                    $id = $row['id'];
                    $title = $row['title_name'];
                    $price = $row['final_price'];
                    $qty = $cartArray[$id];
                    $subtotal = $qty * $price;
                ?>

                    <div class="row">
                        <div class="col1"><a href='productdetails.php?id=<?= $id ?>'><img src="<?= $image ?>" alt="" style="text-align:center; height: 250px; width: 250px; border: solid 3px black;  background-color: white; box-shadow: 0 10px 8px 0 rgba(0, 0, 0, 0.2);"</div>
                        <div class="col2"><a href='productdetails.php?id=<?= $id ?>'><?= $title ?></a></div>
                        <div class="col3">Price: $<?= $price ?></div>
                        <div class="col4">Quantity: <?= $qty ?></div>
                        <div class="col5">Subtotal: $<?php printf("%.2f", $subtotal); ?></div>
                    </div>
                <?php       }//end while
                }//end if ?>
            </div>
        </div>
    </section>
<?php 
require_once('includes/footer.php');
?>