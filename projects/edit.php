<?php
require_once __DIR__ . '/../includes/auth_check.php';
require_once __DIR__ . '/../config/database.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM projects WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$project = mysqli_fetch_assoc($result);

if (!$project) {
    setMessage("project not found", "danger");
    redirect("index.php");
}
?>

<?php include __DIR__ . '/../includes/header.php'; ?>

<h2>Edit project</h2>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">

    <div class="mb-3">
        <label class="form-label">ProjectID</label>
         <input type="text" name="project_id" class="form-control" 
         value="<?php echo htmlspecialchars($project['project_id'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" 
               value="<?php echo $project['title']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" name="description" class="form-control" 
               value="<?php echo $project['description']; ?>">
    </div>
    
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="Not Started" <?php if($project['status']=='Not Started') echo 'selected'; ?>>Not Started</option>
            <option value="In Progress" <?php if($project['status']=='In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="completed" <?php if($project['status']=='completed') echo 'selected'; ?>>Completed</option>
            <option value="on hold" <?php if($project['status']=='on hold') echo 'selected'; ?>>On Hold</option>
             
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update project</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>