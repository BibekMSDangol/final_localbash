<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   if ($select_users->rowCount() > 0) {
      $warning_msg[] = 'email already taken!';
   } else {
      if ($pass != $c_pass) {
         $warning_msg[] = 'Password not matched!';
      } else {
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $number, $email, $c_pass]);

         if ($insert_user) {
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
            $verify_users->execute([$email, $pass]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);

            if ($verify_users->rowCount() > 0) {
               setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
               header('location:home.php');
            } else {
               $error_msg[] = 'something went wrong!';
            }
         }

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
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">

</head>

<body>

   <!-- register section starts  -->

   <section class="container">

      <form id="form" action="" method="post">
         <div class="image1">
            <img src="images/logreg.png" class="img" alt="" />
         </div>
         <div class="heading">
            <h1>Sign Up</h1>
         </div>
         <div class="wrap" id="form">
            <div class="first">
               <label>Name:</label>
               <input type="tel" name="name" required maxlength="50" placeholder="Enter your name" class="box">
               <span class="focus-input"></span>
            </div>
            <div class="last">
               <label>Email:</label>
               <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">
               <span class="focus-input"></span>
            </div>
         </div>
         <div class="wrap1">
            <label>Number:</label>
            <input type="number" name="number" required min="0" max="9999999999" maxlength="10"
               placeholder="Enter your number" class="box">
            <span class="focus-input"></span>
         </div>
         <div class="wrap1">
            <label>Password:</label>
            <input type="password" name="pass" required maxlength="20" placeholder="Enter a password" class="box">
            <span class="focus-input"></span>
         </div>
         <div class="wrap1">
            <label>Confirm Password:</label>
            <input type="password" name="c_pass" required maxlength="20" placeholder="Confirm your password"
               class="box">
            <span class="focus-input"></span>
         </div>
         <input type="submit" value="Sign Up" name="submit" class="btn">
         <p>Already have an account? <a href="login.php">Log In</a></p>

      </form>
      <div class="image">
         <img src="images/reg.jpg" class="img" alt="" />
      </div>

   </section>

   <!-- register section ends -->



   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <?php include 'components/message.php'; ?>

</body>

</html>