<?php
$page_title = "Users details";

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

<h2>User Details</h2>

<table class="userlist">
    <tr>
        <th>User ID</th>
        <td><?php echo $row['user_id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $row['user_name'] ?></td>
    </tr>
    <tr>
        <th>Full Name</th>
        <td><?php echo $row['full_name'] ?></td>
    </tr>
    <tr>
        <th>Email Address</th>
        <td><?php echo $row['user_email'] ?></td>
    </tr>
    <tr>
        <th>Birthdate</th>
        <td><?php echo $row['birthdate'] ?></td>
    </tr>
</table>
    <p>
        <a href="edituser.php?id=<?php echo $row['user_id'] ?>">Edit</a>
        &nbsp;&nbsp;<a href="listusers.php">Cancel</a>
        &nbsp;&nbsp;
        <a href="deleteuser.php?id=<?php echo $row['user_id'] ?>">Delete</a>
    </p>

<p><a href="listusers.php">Back to Users</a></p>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');
?>
