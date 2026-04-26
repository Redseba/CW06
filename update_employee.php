<?php
require "db.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = (int) $_POST['id'];
    $name   = $_POST['name'];
    $job    = $_POST['job'];
    $salary = (float) $_POST['salary'];

    $stmt = $conn->prepare(
        "UPDATE employees SET emp_name=?, job_name=?, salary=? WHERE emp_id=?"
    );
    $stmt->bind_param("ssdi", $name, $job, $salary, $id);

    if ($stmt->execute() && $stmt->affected_rows === 1) {
        $message = "success";
    } else {
        $message = "error";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Employee</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
  <div class="demo-shell">
    <div class="demo-card">

      <h2 class="demo-title">Update Employee</h2>
      <p class="demo-subtitle">Enter the employee ID and the fields you want to update.</p>

      <form method="POST">
        <div class="demo-grid">
          <div class="demo-field">
            <label>Employee ID</label>

            <input class="demo-input" type="number" name="id" required>

          </div>

          <div class="demo-field">
            <label>Name</label>

            <input class="demo-input" type="text" name="name" required>

          </div>

          <div class="demo-field">
            <label>Job</label>

            <input class="demo-input" type="text" name="job" required>

          </div>

          <div class="demo-field">

            <label>Salary</label>
            <input class="demo-input" type="number" step="0.01" name="salary" required>

          </div>
        </div>

        <div class="demo-actions">

          <button class="demo-btn" type="submit">Update Employee</button>
          <a class="demo-btn" href="read_employees.php">View All Employees</a>
        </div>

      </form>

      <?php if ($message === "success"): ?>

        <div class="demo-msg success">Employee updated! <a class="demo-link" href="read_employees.php">View 	records</a></div>

      <?php elseif ($message === "error"): ?>

        <div class="demo-msg error">Something went wrong. Check the ID and try again.</div>

      <?php endif; ?>

    </div>
  </div>
</body>
</html>