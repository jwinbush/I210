<?php
$page_title = "Edit user details";

require_once('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
    exit();
}
$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


//select statement
$sql = "SELECT * FROM users WHERE user_id=$user_id";

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

//display results in a table

?>

    <h2>Edit User Details</h2>

    <form name="edituser" action="updateuser.php" method="get">
        <table class="userdetails">
            <tr>
                <th>User ID</th>
                <td><input name="user_id" value="<?php echo $row['user_id'] ?>" readonly="readonly" /></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input name="user_name" value="<?php echo $row['user_name'] ?>" size="30" required /></td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td><input name="full_name" value="<?php echo $row['full_name'] ?>" size="30" required /></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><input type="email" name="user_email" value="<?php echo $row['user_email'] ?>" size="40" required /></td>
            </tr>
            <tr>
                <th>Birthdate</th>
                <td><input type="date" name="birthdate" value="<?php echo $row['birthdate'] ?>" required /></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Update">&nbsp;&nbsp;
        <input type="button" onclick="window.location.href='userdetails.php?id=<?php echo
        $row['user_id'] ?>'" value="Cancel">
    </form>
<?php
// clean up result sets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');
?>
