<?php

@include 'config.php';

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $time_inout = $_POST['time_inout']; // Time in or out selection
    $time = $_POST['time'];
    $ampm = $_POST['ampm'];

    $insert = "INSERT INTO attendance (name, email, time_inout, time, ampm) VALUES ('$name', '$email', '$time_inout', '$time', '$ampm')";
    $upload = mysqli_query($conn, $insert);

    if ($upload) {
        echo "<script> 
                alert('Attendance Recorded Successfully!');
                window.location.href='user_in-out.php';
            </script>";
    } else {
        $message[] = 'Could not record attendance';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time In/Out</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/ccs/user_in-out.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }
    ?>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <h3>Time In/Out</h3>
                <input type="text" placeholder="Enter Your Name" name="name" class="box" required>
                <input type="email" placeholder="Enter Your Email" name="email" class="box" required>
                <select name="time_inout" class="box">
                    <option value="in">Time In</option>
                    <option value="out">Time Out</option>
                </select>
                <input type="time" name="time" class="box" required>
                <select name="ampm" class="box">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                <input type="submit" class="btn" name="submit" value="Submit">
            </form>
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
</div>

    <script src="assets/js/admin_script.js"></script>

</body>

</html>
