<?php
$host = 'localhost';
$dbname = 'internship_management_system';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);
// $conn = mysqli_connect($host, $dbname, $username, $password);

if (!$conn) {
    die | ("Connection failed: " . mysqli_connect_error());
} 

mysqli_set_charset($conn, "utf8");
echo "Connected successfully";

