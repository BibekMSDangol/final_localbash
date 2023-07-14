<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/aboutus.png" alt="">
      </div>
      <div class="content">
         <h3>About Us</h3>
         <p>LocalBash is an online event booking website that allows people to create or plan certain events like birthdays,
            anniversaries, graduations, and pasni online from a range of restaurants, clubs, and hotels. Based on the event 
            they are setting up and the expected attendance, it provides the user the opportunity to select any venue they like. 
            LocalBash will provide in depth details about the venues including images, and description. To plan an event the user 
            must create an account by signing up and logging into the system.</p>
      </div>
   </div>

</section>

<!-- about section ends -->

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>