<?php

$host = "localhost:3306";
$login = "phpuser";
$password = "phpuser";
$database = "retrogametwo";


$conn = @new mysqli($host, $login, $password, $database);

if ($conn->connect_errno) {
    $error = $conn->connect_error;
    header("Location: error.php?m=$error");
    die();
}
