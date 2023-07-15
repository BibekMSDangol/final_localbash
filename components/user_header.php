<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <div class="logo">
            <a href="home.php">
               <img src="images/logo.png" alt="img">
            </a>
         </div>

         <ul>
            <li><a href="post_venue.php">Post a venue<i class="fa-solid fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
            <li><a href="home.php">Home</a>
               <li><a href="#">My listings<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">Dashboard</a></li>
                     <li><a href="post_venue.php">Post venue</a></li>
                     <li><a href="my_listings.php">My posts</a></li>
                  </ul>
               </li>
               <li><a href="events.php">Events</a>
                  <!-- <ul>
                     <li><a href="search.php">Filter search</a></li>
                     <li><a href="listings.php">All venues</a></li>
                  </ul> -->
               </li>
               <li><a href="#">Help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">About us</a></i></li>
                     <li><a href="feedback.php">Feedback</a></i></li>
                     <li><a href="feedback.php#faq">FAQ</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="saved.php">Favorites<i class="far fa-heart"></i></a></li>
            <li><a href="#"><div class="fas fa-user"></div> </a>
               <ul>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Register</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">Update profile</a></li>
                  <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>

<!-- header section ends -->