<?php

$host = "localhost:3306";
$login = "phpuser";
$password = "phpuser";
$database = "retrogametwo";
$category1 = "SELECT * FROM categories WHERE category_id = 1";
$category2 = "SELECT * FROM categories WHERE category_id = 2";
$category3 = "SELECT * FROM categories WHERE category_id = 3";
$category4 = "SELECT * FROM categories WHERE category_id = 4";
$category5 = "SELECT * FROM categories WHERE category_id = 5";



$conn = @new mysqli($host, $login, $password, $database);

if ($conn->connect_errno) {
    $error = $conn->connect_error;
    header("Location: error.php?m=$error");
    die();
}