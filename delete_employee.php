<?php
require "db.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM employees WHERE emp_id=?");
    $stmt->bind_param("i", $id);

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
  <title>Delete Employee</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
  <div class="demo-shell">
    <div class="demo-card">

      <h2 class="demo-title">Delete Employee</h2>
      <p class="demo-subtitle">Enter the employee ID you want to remove.</p>

      <form method="POST">
        <div class="demo-grid">
          <div class="demo-field">
            <label>Employee ID</label>

            <input class="demo-input" type="number" name="id" required>
          </div>

        </div>

        <div class="demo-actions">

          <button class="demo-btn" type="submit">Delete Employee</button>
          <a class="demo-btn" href="read_employees.php">View All Employees</a>

        </div>
      </form>

      <?php if ($message === "success"): ?>
        <div class="demo-msg success">Employee deleted! <a class="demo-link" href="read_employees.php">View records</a></div>

      <?php elseif ($message === "error"): ?>
        <div class="demo-msg error">Check Entered ID Please!</div>
      <?php endif; ?>

    </div>
  </div>
</body>
</html>