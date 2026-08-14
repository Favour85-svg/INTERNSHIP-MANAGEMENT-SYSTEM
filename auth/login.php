<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . './functions.phpt';


if(isLoggedIn()) {
    redirect("../dashboard.php");
}

$errors = "";



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = cleanInput($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $errors = "Please fill all the feilds";
    } else {
        //Prepared statements....We use it to prevent sql injection
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }
}

