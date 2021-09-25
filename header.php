 <?php
	session_start();
	//  $error = "";

	?>

 <!-- <header> -->

 <!--//~ login pop up -->
 <div class="login-form">
 	<form action="http://localhost:8080/ultimate/includes/login.inc.php" method="post" class="logbox">
		 <h2 id="close">&times</h2>
		 <div id="error-head" style="color:red; font-size:25px; padding:5px 20px; display:none; border:1px solid red; background:rgba(255, 0, 0, 0.12);"></div>
 		<h3>Enter Email</h3>
 		<input type="text" name="email" placeholder="Enter email">
 		<h3>Enter password</h3>
 		<input type="password" name="pwd" placeholder="Enter password">
 		<button type="submit" id="bot" name="login-submit">LOGIN</button>
 	</form>
 </div>
 <!--//* login pop up end -->


 <header>
 	<div class="dark-nav"></div>
 	<!--//? Buggy-->

 	<a href="http://localhost:8080/ultimate/index.php" id="logo"><i class="fab fa-gg-circle"></i></a>
 	<button id="hamburger"><i class="fas fa-bars"></i></button>
 	<nav class="navigation">
 		<span id="close-nav">&times</span>

 		<ul class="list">
 			<form action="http://localhost:8080/ultimate/search.php" method="post" class="search-stuff">
 				<input type="text" name="search" placeholder="Type to search" id="search">
 				<button type="submit" value="search" id="search-but"><i class="fas fa-search"></i></button>
 			</form>
 			<li><a href="http://localhost:8080/ultimate/index.php">Home</a></li>
 			<li><a href="http://localhost:8080/ultimate/index.php#services">Services</a></li>
 			<li><a href="#footer">Contact</a></li>
 			<li id="search-text"><a href="http://localhost:8080/ultimate/search.php">Search</a></li>


 			<?php
				if (isset($_SESSION['email'])) {
					echo ' <form action="http://localhost:8080/ultimate/includes/logout.inc.php" class="logout-button" method="post">
				<div><i class="fas fa-user-circle"></i>&nbspHi!</div>
				<ul id="user-dropdown">
					<li><a href="http://localhost:8080/ultimate/profile.php">User Profile</a></li>
					<li><a href="http://localhost:8080/ultimate/mybookings.php">My Bookings</a></li>
					<li><a href="http://localhost:8080/ultimate/change-password.php">Change Password</a></li>
      				<li>  <a href="http://localhost:8080/ultimate/feedback.php"><i class="far fa-comment-dots"></i></a></li>
		<li><button type="submit"  name="logout-submit">Logout</button></li>
				</ul>
								
              </form>';
				} else {
					echo '<div class="logging">
                  <li><a href="#" id="login" >Login <i class="fas fa-sign-in-alt"></i></a></li>
                  
                  <li><a href="http://localhost:8080/ultimate/signup.php">Signup <i class="fas fa-user-plus"></i></a></li>
               </div>';
				}
				?>
 		</ul>
				
 	</nav>
 	
 </header>

 <!-- <script src="http://localhost:8080/ultimate/js/slide.js"></script> -->
 <!-- </header> -->