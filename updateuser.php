<?php
$page_title = "Update user details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve, sanitize, and escape all fields from the form
$user_id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT)));
$user_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_name', FILTER_SANITIZE_STRING)));
$full_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'full_name', FILTER_SANITIZE_STRING)));
$user_email = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_email', FILTER_SANITIZE_EMAIL)));
$birthdate = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'birthdate', FILTER_DEFAULT)));

//define MySQL update statement
$sql = "UPDATE users SET
        user_name='$user_name',
        full_name='$full_name',
        user_email='$user_email',
        birthdate='$birthdate' WHERE user_id=$user_id";

//execute the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}
echo "Your account has been updated.";

// close the connection.
$conn->close();

include ('includes/footer.php');
