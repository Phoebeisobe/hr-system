<?php

require_once ('config.php');
$query = "SELECT * FROM user_form";
$result = mysqli_query($conn, $query);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM user_form WHERE id = $id");
  header('location: user_employee.php');
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin|Employees</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/ccs/user_index.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="c-title">
    <h1>Employees</h1>
    <table class="cont">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Email</th>
        <th>position</th>
      </tr>
      <tr>
        <?php

        while ($row = mysqli_fetch_assoc($result)) {

          ?>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['firstname'] ?></td>
          <td><?php echo $row['lastname'] ?></td>
          <td><?php echo $row['gender'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['user_type'] ?></td>

        </tr>
        <?php

        }

        ?>

    </table>
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