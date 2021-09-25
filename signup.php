<?php
// require "header.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://kit.fontawesome.com/3fdeee195a.js" crossorigin="anonymous"></script>
  <title>Register</title>
</head>

<body>


  <div class=" signup-shiz">


    <!-- //*Header -->
    <?php
    require "header.php";
    ?>
    <!-- //? End Header -->



 
    <form action="includes/signup.inc.php" method="post" class="register">
      <h1>Create Account</h1>

      <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p class="signuperror">Fill in all the fields!</p>';
      } elseif ($_GET['error'] == "invalid mail and user name") {
        echo '<p class="signuperror">Fill in all the fields!</p>';
      } elseif ($_GET['error'] == "invalid username") {
        echo '<p class="signuperror">Invalid username</p>';
      } elseif ($_GET['error'] == "invalidmail") {
        echo '<p class="signuperror">Invalid Email</p>';
      } elseif ($_GET['error'] == "passwordcheck") {
        echo '<p class="signuperror">Password do not match!</p>';
      } elseif ($_GET['error'] == "emailregistered") {
        echo '<p class="signuperror">This email is already taken!</p>';
      }
    }
    if (isset($_GET['signup']) == "success") {
      echo '<p class="signupsuccess">Signup Successful!</p>';
    }
    ?>

      <ul class="register-list">
        <li><i class="fas fa-user"></i> <input type="text" name="fname" placeholder="First name"></li>
        <li><i class="far fa-user"></i> <input type="text" name="lname" placeholder="Last name"></li>
        <li><i class="fas fa-paper-plane"></i> <input type="text" name="mail" placeholder="Email"></li>
        <li><i class="fas fa-mobile-alt"></i> <input type="text" name="phoneno" placeholder="Phone No."></li>
        <li><i class="fas fa-lock"></i> <input type="password" name="pwd" placeholder="Enter password"></li>
        <li><i class="fas fa-lock"></i> <input type="password" name="pwd-repeat" placeholder="Repeat password"></li>

      </ul>

      <button type="submit" name="signup-submit">Get Started</button>
    </form>
  </div>
  <script src="./js/slide.js"></script>
</body>

</html>


<?php
require "footer.php";
?>