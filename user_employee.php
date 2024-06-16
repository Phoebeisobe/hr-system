<?php 

require_once('config.php');
$query = "SELECT * FROM user_form";
$result = mysqli_query($conn,$query);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM user_form WHERE id = $id");
    header('location: user_employee.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employees</title>
<!-- custom css file link  -->
<link rel="stylesheet" href="assets/ccs/user_index.css">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<!-- employee table -->
<body>
<div class="c-title">
    <h1>Employees</h1>
    <table class="cont">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Email</th>
            <th>position</th>
        </tr>
        <tr>
            <?php  
            
            while($row = mysqli_fetch_assoc($result))
            {

            ?>
            <td><?php echo $row['firstname']?></td>
            <td><?php echo $row['lastname']?></td>
            <td><?php echo $row['gender']?></td>
            <td><?php echo $row['address']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['user_type']?></td>

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
            <a href="user_index.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-home'></i>
              </span>            
              <span class="navlink">Home</span>
            </a>
          </li>
          <li class="item">
            <a href="user_employee.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-group'></i>
              </span>
              <span class="navlink">Employees</span>
            </a>
          </li>
          <li class="item">
            <a href="user_in-out.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-calendar-check'></i>
              </span>
              <span class="navlink">Time IN/OUT</span>
            </a>
          </li>
        </ul>
        <ul class="menu_items">  

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
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