<?php
require_once('includes/database.php');
require_once('includes/header.php');


?>

<head>
    <title>Retro Video Game Store: Register | Retro Games</title>
</head>
<section class="main-section section-padding">
    <div class="page-navigation">
        <ul>
            <li class="page-navsli page-nav"><a href="#">Home</a></li>
            <li class="page-navsli page-nav">></li>
            <li class="page-navsli page-nav">Create Account</li>
        </ul>
    </div>
    <div class="register-content">
        <div class="register-div">
            <div class="register-heading">
                Register Now or <a style="color: red;" href="signin.php">Sign In</a>
            </div>
            <div class="register-text">
                Sign up now and receive points on every purchase!
            </div>
        </div>

        <form class="" action="" method="post" autocomplete="off">
            <div class="register-form">
                <div class="form-groups">
                    <div class="input-div">
                        <input type="text" class="input-field" name="firstname" placeholder="First Name" required
                            value="">
                    </div>
                    <div class="input-div">
                        <input type="text" class="input-field" name="firstname" placeholder="Last Name" required
                            value="">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="input-div">
                        <input type="date" class="input-field" name="date" required value="">
                    </div>
                    <div class="input-div">
                        <input type="text" class="input-field" name="username" placeholder="Username" required value="">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="input-div">
                        <input type="password" class="input-field" name="password" placeholder="Password" required
                            value="">
                    </div>
                    <div class="input-div">
                        <button type="submit" name=" submit" class=" submit-button">Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
require_once('includes/footer.php');
?>
