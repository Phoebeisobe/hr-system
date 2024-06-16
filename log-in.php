<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['firstname'];
         header('location:admin_index.php');

      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['firstname'];
         header('location:user_index.php');

      }

   } else {
      $error[] = 'incorrect email or password!';
   }

}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login/Signup</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/ccs/log-index.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>Login</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         }
         ;
         ?>
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>don't have an account? <a href="register.php">Signup now</a></p>
         <div class="home-btn-container">
            <a href="index.php" class="home-btn">Back to Homepage</a>
         </div>
      </form>

   </div>

</body>

</html>