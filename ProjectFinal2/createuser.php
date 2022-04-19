<?php
$page_title = "Create a new user";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape user's input from a form
$user_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_name', FILTER_SANITIZE_STRING)));
$full_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'full_name', FILTER_SANITIZE_STRING)));
$user_email = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_email', FILTER_SANITIZE_EMAIL)));
$birthdate = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'birthdate', FILTER_DEFAULT)));


//define the MySQL insert statement
$sql = "INSERT INTO users VALUES (NULL, '$user_name', '$full_name', '$user_email', '$birthdate')";

//execute the query
$query = @$conn->query($sql);

//handle error
if(!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

echo "The new user account has been created.";
$conn->close();

include 'includes/footer.php';
