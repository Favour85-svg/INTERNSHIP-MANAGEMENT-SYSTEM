<?php 
require_once __DIR__ . '/../includes/auth_check.php';
require_once __DIR__ . '/../config/database.php';

// Fetch all interns
$sql = "SELeCT FROM interns ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<?php
include __DIR__ . '/../includes/header.php';

<div class="d-flex justify-content align-items-center mb-4">
<h2>Interns</h2>
</div>