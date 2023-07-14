<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_users->execute([$email, $pass]);
   $row = $select_users->fetch(PDO::FETCH_ASSOC);

   if ($select_users->rowCount() > 0) {
      setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
      header('location:home.php');
   } else {
      $warning_msg[] = 'Incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">

</head>

<body>


   <!-- login section starts  -->

   <section class="container">

      <form id="form" action="" method="post">
         <div class="image">
            <img src="images/logreg.png" class="img" alt="" />
         </div>
         <div class="heading">
            <h1>Log In</h1>
         </div>
         <div class="wrap1" id="form">
            <label>Email:</label>
            <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
            <span class="focus-input"></span>
         </div>
         <div class="wrap1" id="form">
            <label>Password:</label>
            <input type="password" name="pass" required maxlength="20" placeholder="Enter your password" class="box">
            <span class="focus-input"></span>
         </div>
         <input type="submit" value="Login" name="submit" class="btn">
         <p>Don't have an account? <a href="register.php">Sign Up</a></p>

      </form>
      <div class="image">
         <img src="images/log.jpg" class="img" alt="" />
      </div>

   </section>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <?php include 'components/message.php'; ?>

</body>

</html>