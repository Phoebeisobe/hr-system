<?php

@include 'config.php';

session_start();
$query = "SELECT * FROM user_form";
$result = mysqli_query($conn, $query);

if(!isset($_SESSION['user_name'])){
   header('location:log-in.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/ccs/user_index.css">
   <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>
<body>
   
<div class="container">
   <div class="content">
      <h3>Hello, <span>User</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Hope you have a Great Day!</p>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <a href="user_updatep.php?edit=<?php echo $row['id']; ?>" class="btn"> <i
                class="fas fa-edit"></i> My Account</a>
      <?php } ?>
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

</div>

</body>
</html>