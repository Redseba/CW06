<?php
require "db.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = $_POST['emp_name'];
    $job    = $_POST['job_name'];
    $salary = (float) $_POST['salary'];
    $hire   = $_POST['hire_date'];
    $deptId = (int) $_POST['department_id'];
    $dept   = $_POST['department_name'];

    $stmt = $conn->prepare(
        "INSERT INTO employees
         (emp_name, job_name, salary, hire_date, department_id, department_name)
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssdsid", $name, $job, $salary, $hire, $deptId, $dept);

    if ($stmt->execute()) {
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
  <title>Employee Demo</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">

  <div class="demo-shell">
    <div class="demo-card">

      <h2 class="demo-title">Add New Employee</h2>
      <p class="demo-subtitle">Fill out the form below to insert a new record into the database.</p>

      <form method="POST">

        <div class="demo-grid">
          <div class="demo-field">
            <label>Employee Name</label>
            <input class="demo-input" type="text" name="emp_name" required>
          </div>

          <div class="demo-field">
            <label>Job Title</label>
            <input class="demo-input" type="text" name="job_name" required>
          </div>

          <div class="demo-field">
            <label>Salary</label>
            <input class="demo-input" type="number" step="0.01" name="salary" required>
          </div>

          <div class="demo-field">
            <label>Hire Date</label>
            <input class="demo-input" type="date" name="hire_date" required>
          </div>

          <div class="demo-field">
            <label>Department ID</label>
            <input class="demo-input" type="number" name="department_id" required>
          </div>

          <div class="demo-field">
            <label>Department Name</label>
            <input class="demo-input" type="text" name="department_name" required>
          </div>
        </div>

        <div class="demo-actions">
  		<button class="demo-btn" type="submit">Add Employee</button>
  		<a class="demo-btn" href="read_employees.php">View All Employees</a>
  		<a class="demo-btn" href="update_employee.php">Update Employee</a>
  		<a class="demo-btn" href="delete_employee.php">Delete Employee</a>
	</div>

      </form>

      <?php if ($message === "success"): ?>

        <div class="demo-msg success">Employee added successfully! <a class="demo-link" 	href="read_employees.php">View records</a></div>

      <?php elseif ($message === "error"): ?>

        <div class="demo-msg error">Something went wrong. Please try again.</div>

      <?php endif; ?>

    </div>
  </div>
</body>
</html>