<?php

require_once ('config.php');

// Fetch attendance data
$sql = "SELECT name, email, time_inout, CONCAT(time, ' ', ampm) AS formatted_time, date FROM attendance ORDER BY date, time ASC";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin|Attendance Monitoring</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/ccs/admin_empmoni.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>


  <div class="container">
    <div class="attendance-table-container">
      <h2>Attendance Monitoring</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Time In/Out</th>
            <th>Time</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['time_inout'] . "</td>";
              echo "<td>" . $row['formatted_time'] . "</td>";
              echo "<td>" . $row['date'] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5'>No attendance records found.</td></tr>";
          }
          mysqli_free_result($result);
          mysqli_close($conn); // Close connection
          ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- navbar -->
  <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      Human Resource Information System
    </div>

    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <a href="logout.php" class="out-btn">logout</a>
    </div>
  </nav>

  <!-- sidebar -->
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <li class="item">
          <a href="admin_index.php" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-home'></i>
            </span>
            <span class="navlink">Home</span>
          </a>
        </li>
        <li class="item">
          <a href="admin_employee.php" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-group'></i>
            </span>
            <span class="navlink">Employees</span>
          </a>
        </li>
        <li class="item">
          <a href="admin_empacc.php" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-id-card'></i>
            </span>
            <span class="navlink">Manage Accounts</span>
          </a>
        </li>
        <li class="item">
          <a href="admin_empmoni.php" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-user-detail'></i>
            </span>
            <span class="navlink">Employee Monitoring</span>
          </a>
        </li>
        <li class="item">
          <a href="admin_contact.php" class="nav_link">
            <span class="navlink_icon">
            <i class='bx bxs-envelope'></i>
            </span>
            <span class="navlink">Emails</span>
          </a>
        </li>
      </ul>
      <ul class="menu_items">

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in'></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
    </div>
  </nav>
  <!-- JavaScript -->
  <script src="assets/js/admin_script.js"></script>

</body>

</html>