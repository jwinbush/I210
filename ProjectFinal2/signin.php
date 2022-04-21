<?php
require_once('includes/database.php');
require_once('includes/header.php');

if(isset($_POST['signin'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";

    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    $_SESSION['uid'] = $row['ID'];
    $_SESSION['FirstName'] = $row['FirstName'];

    header('location: index.php');
}
?>

<head>
    <title>Retro Video Game Store: Sign In | Retro Games</title>
</head>
<section class="main-section section-padding">
    <div class="page-navigation">
        <ul>
            <li class="page-navsli page-nav"><a href="index.php">Home</a></li>
            <li class="page-navsli page-nav">></li>
            <li class="page-navsli page-nav"><a href="signin.php">Sign In</a></li>
        </ul>
    </div>
    <div class="register-content">
        <div class="register-div">
            <div class="register-heading">
                Sign In or <a style="color: red;" href="register.php">Register Now</a>
            </div>
            <div class="register-text">
                Sign in now to redeem your rewards!
            </div>
        </div>
        <form action="signin.php" method="post">
            <div class="form-groups">

                <div class="input-div">
                    <input type="text" class="input-field" name="email" placeholder="email@example.com" required value="">
                </div>
            </div>
            <div class="form-groups">
                <div class="input-div">
                    <input type="password" class="input-field" name="password" placeholder="Password" required value="">
                </div>
                <div class="input-div">
                    <button type="submit" name="signin" class=" submit-button">Sign in</button>

                </div>
            </div>
        </form>
    </div>
    </div>
</section>
<?php
require_once('includes/footer.php');
?>
