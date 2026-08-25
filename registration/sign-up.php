<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';


if (isLoggedIn()) {
    redirect("../dashboard.php");
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = cleanInput($_POST["role"]);

    if (empty($email) || empty($password)) {
        $error = "Please fill all the fields.";
    } else {
        //prepared statements
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $rol);


        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            session_start();
            setMessage("Registered successfully!");
            redirect("../dashboard.php");
        } else {
            setMessage("Error: " . mysqli_error($conn), "danger");
            // redirect("");
        }
    }
}
?>


<?php include __DIR__ . '/../includes/header.php'; ?>
<div class="row-justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card-shadow">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Register</h3>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Role</label>
                        <select name="role" class="form-control" required id="role">
                            <option value="">-- Role --</option>
                            <option value="admin" >Admin</option>
                            <option value="intern" >Intern</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Signup</button>
            </div>

        </div>

    </div>
</div>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>