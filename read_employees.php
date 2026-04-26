<?php
require "db.php";
$result = $conn->query("SELECT * FROM employees ORDER BY emp_id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Employees</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">

  <div class="demo-shell">
    <div class="demo-card">

      <h2 class="demo-title">All Employees</h2>
      <p class="demo-subtitle">Records pulled from the employees table.</p>

      <table class="demo-table">

        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Job</th>
          <th>Salary</th>
          <th>Hire Date</th>
          <th>Dept</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>

        <tr>
          	<td><?= htmlspecialchars($row['emp_id']) ?></td>
	  	<td><?= htmlspecialchars($row['emp_name']) ?></td>
		<td><?= htmlspecialchars($row['job_name']) ?></td>
		<td>$<?= number_format($row['salary'], 2) ?></td>
		<td><?= htmlspecialchars($row['hire_date']) ?></td>
		<td><?= htmlspecialchars($row['department_name']) ?></td>
        </tr>

        <?php endwhile; ?>
      </table>

      <div class="demo-actions">
        <a class="demo-btn" href="employee_demo.php">Add New Employee</a>
      </div>

    </div>
  </div>
</body>
</html>