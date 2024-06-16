<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:log-in.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin|Home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/ccs/user_index.css">
   <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>
<body>
   

<div class="container">
   <div class="content">
      <h3>Hello, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
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

</div>

</body>
</html>