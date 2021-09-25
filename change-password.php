<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password | VisitMeg</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="./css/signup.css"> -->

</head>

<body>
    <div class="main-maincontainer">
        <!-- //*Header -->
        <?php
        require_once "includes/dbh.inc.php";
        require "./header.php";
        ?>
        <?php
        $email = $_SESSION['email'];
        $name = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
        $row = mysqli_fetch_assoc($name);

        $_SESSION['msg'] = "";
        if (isset($_SESSION['email'])) {
            if (isset($_POST['submit'])) {
                $oldpwd = $_POST['oldpwd'];
                $newpwd = $_POST['newpwd'];
                $confirmpwd = $_POST['confirmpwd'];
                if ($newpwd != $confirmpwd) {
                    $_SESSION['msg'] = "Passwords do not match!";
                } else {
                    $sql = "SELECT * FROM user WHERE email ='$email'";
                    $results = mysqli_query($conn, $sql);
                    $num = mysqli_fetch_assoc($results);
                    $pwdcheck = password_verify($oldpwd, $num['upassword']);
                    if ($pwdcheck == true) {
                        $hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
                        mysqli_query($conn, "UPDATE user SET upassword='$hashedPwd' where email='$email'");
                        $_SESSION['msg'] = "Sucessful";
                    } else if ($pwdcheck == false) {
                        $_SESSION['msg'] = "Previous password incorrect!";
                    } else {
                        $_SESSION['msg'] = "Previous password incorrect!";
                    }
                }
            }
            ?>




            <section id="main-content">
                <section class="wrapper">
                <h2 style="color:#000; font-size: 30px; text-align:center; padding:5px 0;  margin:30px;">Change password</h2>
                    <h3 style=" margin:0 0 20px 0;"><b><?php echo $row['fname'] . "'s  Information"; ?></b></h3>
                        <p style="color:#F00; font-size: 15px; text-align:center; border:1px solid red; padding: 5px; background:rgba(255, 0, 0, 0.18); margin:10px;"><?php echo $_SESSION['msg']; ?> </p>
                    
                    <form action="change-password.php" method="post" class="change-pass content-panel " onSubmit="return valid();">
                        <!-- <input type="password" name="oldpwd" placeholder="Enter password">
                    <input type="password" name="newpwd" placeholder="Enter new password">
                    <input type="password" name="confirmpwd" placeholder="Confirm new password">
                    <button type="submit" name="submit">Change</button> -->

                        <!-- test -->
                        <div class="form-group">
                            <!-- <label class="col-sm-2 col-sm-2 control-label">First Name </label> -->
                            <input type="password" name="oldpwd" class="focusable" placeholder="Enter old password">
                        </div>

                        <div class="form-group">
                            <!-- <label class="col-sm-2 col-sm-2 control-label">Last Name</label> -->
                            <input type="password" name="newpwd" class="focusable" placeholder="Enter new password">
                        </div>

                        <div class="form-group">
                            <!-- <label class="col-sm-2 col-sm-2 control-label">Email </label> -->
                            <input type="password" name="confirmpwd" class="focusable" placeholder="Confirm new password">
                        </div>


                        <div class="update">
                            <input type="submit" name="submit" value="Update" class="btn btn-theme"></div>
                        <!-- test -->
                    </form>
                </section>

            </section>
            <!-- 

            <div class="wrapper fixed">
                <a href="./profile.php">User Profile</a>
                <a href="./change-password.php">Change Password</a>
                <a href="./mybookings.php">My Bookings</a>
                <a href="./includes/logout.inc.php">Logout</a>
            </div> -->

            <?php
                include "footer.php";
                ?>

    </div>

</body>

</html>
<?php } else {
    header("Location: index.php");
}
?>