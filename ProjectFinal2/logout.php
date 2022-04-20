<?php
session_start();
require_once('includes/database.php');
unset($_SESSION['uid']);
unset($_SESSION['FirstName']);
require_once('includes/header.php');

if(isset($_POST['home']))
    header('location:index.php');
?>
<section class="main-section section-padding">
<div class="register-content">
    <div class="register-div">
        <div class="register-heading">
            You have been logged out.<br><br>
        </div>
        <div class="register-heading">
            <a style="color: red;" href="signin.php">Sign In</a>
        </div>
        <div class="register-text">
            Click the button to continue home as a guest or return to the login screen by clicking above
        </div>
    </div>

    <form class="" action="logout.php" method="post" autocomplete="off">
        <div class="register-form">
            <div class="form-groups">
                <div class="input-div">
                    <button type="submit" name="home" class=" submit-button">Back to Home</button>
                </div>
            </div>
        </div>
    </form>
</div>
</section>
 <?php
 require_once('includes/footer.php');
 ?>
