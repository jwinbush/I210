
<?php
if (session_status()== PHP_SESSION_NONE) {
    session_start();
}
//login prompt
if (!isset($_SESSION['login'])) {
    header("Location: loginform.php");
    exit();
}
//empty the shopping cart
$_SESSION['cart'] = '';

//set page title
$page_title= "PHP Online Bookstore Book Checkout";
//display the header
require_once ('includes/header.php');

?>
    <h2>Checkout</h2>
    <p>Thank you for shopping with us. Your business is greatly appreciated.
        You will be notified once your items are shipped.
    </p>

<?php
include ('includes/footer.php');
?>
