
<?php

@include 'config.php';

$id = $_GET['edit'];

if (isset($_POST['update_product'])) {

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $number = $_POST['number'];
  $email = $_POST['email'];

  $tablename = 'user_form';

  if (empty($firstname) || empty($lastname) || empty($gender) || empty($address) || empty($number) || empty($email)) {
    $message[] = 'please fill out all!';
  } else {

    $update_data = "UPDATE $tablename SET firstname='$firstname', lastname='$lastname', gender='$gender', address='$address', number='$number', email='$email'  WHERE id = '$id'";
    $upload = mysqli_query($conn, $update_data);

    if ($upload) {
      header('location:admin_empacc.php');
    } else {
      $message[] = 'Failed to update user!';
    }

  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPDATE</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/ccs/admin_updatep.css" />
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
    <div class="admin-product-form-container centered">

      <?php

      $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$id'");
      while ($row = mysqli_fetch_assoc($select)) {

      ?>

        <form action="" method="post" enctype="multipart/form-data">
          <h3 class="title">Update User</h3>
          <input type="text" class="box" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="Enter First Name">
          <input type="text" class="box" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Enter Last Name">
          <input type="text" class="box" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Enter Gender">
          <textarea name="address" class="box" placeholder="Enter Address"><?php echo $row['address']; ?></textarea>
          <input type="number" min="0" class="box" name="number" value="<?php echo $row['number']; ?>" placeholder="Enter Phone Number">
          <input type="email" class="box" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email">
          <input type="submit" value="Update User" name="update_product" class="btn">
          <a href="admin_empacc.php" class="btn">Go Back!</a>
        </form>

      <?php

      }

      ?>
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
            <a href="admin_about.php" class="nav_link">
              <span class="navlink_icon">
               <i class='bx bxs-info-circle' ></i>
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
</body>

</html>
