<?php

@include 'config.php';

if (isset($_POST['submit'])) {

  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $number = mysqli_real_escape_string($conn, $_POST['number']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $user_type = $_POST['user_type'];

  $select = " SELECT * FROM user_form WHERE email = '$email' ";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    $error[] = 'user already exist!';

  } else {

    if ($pass != $cpass) {
      $error[] = 'password not matched!';
    } else {
      $insert = "INSERT INTO user_form(firstName, lastName, gender, address, number, email, password, user_type) VALUES('$firstName','$lastName','$gender','$address','$number','$email','$pass','$user_type')";
      mysqli_query($conn, $insert);
      header('location:log-in.php');
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
  <title>Signup</title>

  <link rel="stylesheet" href="assets/ccs/log-index.css">

</head>

<body>

  <div class="form-container">

    <form action="" method="post">
      <h3>Signup</h3>
      <?php
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<span class="error-msg">' . $error . '</span>';
        }
      }
      ?>
      <input type="text" name="firstName" required placeholder="enter your first name">
      <input type="text" name="lastName" required placeholder="enter your last name">
      <select name="gender">
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>
      <input type="text" name="address" required placeholder="enter your address">
      <input type="text" name="number" required placeholder="enter your phone number">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
        <option value="user">user</option>
        <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="log-in.php">login now</a></p>
      <div class="home-btn-container">
        <a href="index.php" class="home-btn">Back to Homepage </a>
      </div>
    </form>

  </div>

</body>

</html>
