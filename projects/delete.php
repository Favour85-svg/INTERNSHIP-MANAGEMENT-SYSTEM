<?php
require_once __DIR__ . '/../includes/auth_check.php';
require_once __DIR__. '/../config/database.php';

$id = $_GET['id'] ?? 0;

$sql =  "DELETE FROM projects WHERE id = ?";
$stm = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stm, "i", $id);

if (mysqli_stmt_execute($stm)) {
    setMessage("project deleted successfully");
} else {
    setMessage("Error deleting project", "danger");
}

redirect("index.php");
?>