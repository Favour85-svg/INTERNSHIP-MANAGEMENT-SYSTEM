<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . './functions.phpt'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>INTERNSHIP MANAGEMENT SYSTEM</title>
</head>
<body>
    <nav class="navbar navbar-expan-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="../dashboard.php">Internship Management System</a>
            <?php if (isLoggedIn()): ?>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="../dashboard.php">Dashboard</a>
                    <a class="nav-link" href="../interns/index.php">Interns</a>
                    <a class="nav-link" href="../projects/index.php">Projects</a>
                    <a class="nav-link" href="../attendance/index.php">Attendance</a>

                </div>
            <?php endif?>
        </div>
    </nav>
    <div class="container ">

