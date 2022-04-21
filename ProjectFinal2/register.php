<?php
require_once('includes/database.php');
require_once('includes/header.php');

if(isset($_POST['register'])){

    $emailVal = 'SELECT COUNT(Email) as EmCount FROM users WHERE Email ="' . $_POST['email'] . '"';
    $query = $conn->query($emailVal);
    $row = $query->fetch_assoc();
    $emailCount = $row["EmCount"];
    print $emailCount;


    if(!isset($_POST['email']) || !isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['password']) || !isset($_POST['birthday']) || $_POST['password'] != $_POST['confpassword']){
        echo '<h2 style="color: #ad0c27; text-align: center;">Please enter valid information.</h2>';

    }

    elseif($emailCount != 0) {
        echo '<h2 style="color: #ad0c27; text-align: center;">This email address has already been used.</h2>';
    }
    else{
        $userName = trim($_POST['email']);
        $firstName = trim($_POST['firstname']);
        $lastName = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $admin = '0';
        $birthday = date('Y-m-d', $_POST['date']);


        $sql = 'INSERT INTO users(UserName, FirstName, LastName, Email, Password, Admin, Birthday) VALUES ("'.$userName.'", "'.$firstName.'", "'.$lastName.'", "'.$email.'", "'.$password.'", "'.$admin . '", "'.$birthday .'")';

        $query = $conn->query($sql);
        $lastID = $conn->insert_id;
        $getID = 'SELECT * FROM users WHERE ID =' . $lastID;

        $query = $conn->query($getID);

        $row = $query->fetch_assoc();

        $_SESSION['uid'] = $row['ID'];
        $_SESSION['FirstName'] = $row['FirstName'];

        header('location:index.php');

    }
}
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

        <form class="" action="register.php" method="post" autocomplete="off">
            <div class="register-form">
                <div class="form-groups">
                    <div class="input-div">
                        <input type="text" class="input-field" name="firstname" placeholder="First Name" required
                            value="<?php print $_POST['firstname'];?>">
                    </div>
                    <div class="input-div">
                        <input type="text" class="input-field" name="lastname" placeholder="Last Name" required
                            value="<?php print $_POST['lastname'];?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="input-div">
                        <input type="date" class="input-field" name="birthday" required value="<?php print $_POST["birthday"]; ?>">
                        <label for="date">Birthday</label>
                    </div>
                    <div class="input-div">
                        <input type="email" class="input-field" name="email" placeholder="email@example.com" required value="<?php print $_POST['email'];?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="input-div">
                        <input type="password" class="input-field" name="password" placeholder="Password" required
                            value="">
                    </div>
                    <div class="input-div">
                        <input type="password" class="input-field" name="confpassword" placeholder="Confirm Password" required
                               value="">
                    </div>
                </div>

                <div class="form-groups"
                    <div class="input-div">
                        <button type="submit" name="register" class=" submit-button">Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
require_once('includes/footer.php');
?>
