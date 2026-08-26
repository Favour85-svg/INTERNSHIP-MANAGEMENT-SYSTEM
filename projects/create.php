<?php
require_once __DIR__ . '/../includes/auth_check.php';
require_once __DIR__ . '/../config/database.php';

// Get active projects for dropdown
$projects = mysqli_query($conn, "SELECT id, intern_id, title FROM projects WHERE status = 'active' ORDER BY title");
?>

<?php include __DIR__ . '/../includes/header.php'; ?>

<h2>Assign New Project</h2>

<form action="store.php" method="POST" class="mt-4">
    <div class="mb-3">
        <label class="form-label">Create Project</label>
        <select name="intern_id" class="form-select" required>
            <option value="">-- Create Project --</option>
            <?php while ($i = mysqli_fetch_assoc($projects)): ?>
                <option value="<?php echo $i['id']; ?>">
                    <?php echo $i['intern_id'] . ' - ' . $i['title']; ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Project Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
            <option value="On Hold">On Hold</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save Project</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>