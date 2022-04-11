<?php
session_start();

// Khai bao hang so
define("SITEURL", "http://localhost/food-order/");
define("LOCALHOST", "localhost");
define("USER_NAME", "root");
define("PASS_WORD", "");
define("DBNAME", "food-order");
// create connection
$conn = new mysqli(LOCALHOST, USER_NAME, PASS_WORD, DBNAME);
// check connection to SQL
if ($conn->connect_error) {
    die("Connect failed" . $conn->connect_error);
} else {
    echo "connect to database is successfully";
}
