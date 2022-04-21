<?php


require_once('includes/database.php');
require_once('includes/header.php');

?>
<head>
    <title>Edit User | Retro Games</title>
</head>

<?php

//select statement
$sql = "SELECT * FROM users WHERE ID=$uid";

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once('includes/footer.php');
    exit;
}

//retrieve results
$row = $query->fetch_assoc();

?>
<div class="register-content">
    <div class="register-div">
        <?php
        if(isset($_POST['editUser'])){

            $firstName = $_POST['firstName'];

            $lastName = $_POST['lastName'];

            $email = $_POST['email'];

            $birthday = date('Y-m-d', $_POST['date']);






            $sql = "UPDATE users SET FirstName = '$firstName', LastName = '$lastName', Email ='$email', Birthday = '$birthday' WHERE ID = $uid";
            $query = $conn->query($sql);

            echo '<h2 style="color: #0ca845;">Account Successfully Updated.</h2>';

        }

        ?>
        <div class="register-heading">
            <h2>Edit User Details</h2>
        </div>
    <form action="edituser.php" method="post">
        <table class="userdetails">
            <tr>
                <th>First Name:   </th>
                <td><input name="firstName" value="<?php echo $row['FirstName'] ?>" size="30" required /></td>
            </tr>
            <tr>
                <th>Last Name:   </th>
                <td><input name="lastName" value="<?php echo $row['LastName'] ?>" size="30" required /></td>
            </tr>
            <tr>
                <th>Email:   </th>
                <td><input type="email" name="email" value="<?php echo $row['Email'] ?>" size="40" required /></td>
            </tr>
            <tr>
                <th>Birthday:   </th>
                <td> <input type="date" class="input-field" name="birthday" required><?php print $_POST["birthday"]; ?></td>
            </tr>
        </table>
        <br>
        <button class="submit-button" type="submit" value="Update" name="editUser">Update</button>
    </form>
    </div>
</div>
<?php

//include the footer
require_once('includes/footer.php');
?>
