<?php
require_once __DIR__ . '/../includes/auth_check.php';
require_once __DIR__ . '/../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id          =(INT)($_POST['id']);
    $project_id  = cleanInput($_POST['id']);
    $title       = cleanInput($_POST['title']);
    $description = cleanInput($_POST['description']);
    $status      = cleanInput($_POST['status']);
    // $start_date  = cleanInput($_POST['start_date']);
    // $end_date    = cleanInput($_POST['end_date']);
    

    // Simple validation
    if (empty($project_id) || empty($title)) {
        setMessage("project id and Title are required", "danger");
        redirect("create.php");
    }

    // Insert using prepared statement
    $sql = "UPDATE projects SET 
    id =?,
     title =?, 
     description =?, 
    status =? 
    WHERE id=?" ;

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $project_id, $title, $description, $status, $id);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        setMessage("project updated successfully!");
        redirect("index.php");
    } else {
        setMessage("Error: " . mysqli_error($conn), "danger");
                redirect("edit.php");
    }
} else {
    redirect("create.php");
}
?>

