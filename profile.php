<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile | VisitMeg</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>


    <div class="main-maincontainer">
        <!-- //*Header -->
        <?php
        require "./header.php";
        ?>
        <?php
        require_once "./includes/dbh.inc.php";
        $_SESSION['msg'] = "";
        $email = $_SESSION['email'];


        if (isset($_SESSION['email'])) {
            // for updating user info    
            if (isset($_POST['Submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $contact = $_POST['contact'];
                $query = mysqli_query($conn, "UPDATE user set fname='$fname' ,lname='$lname' , Phone_no='$contact' where email='$email'");
                if ($query) {
                    $_SESSION['msg'] = "Profile Updated successfully";
                } else {
                    $_SESSION['msg'] = "Profile Updating failed";
                }
            }
            ?>






            <?php $ret = mysqli_query($conn, "SELECT * from user where email='$email'");
                while ($row = mysqli_fetch_array($ret)) { ?>
                <section id="main-content">
                    <section class="wrapper">
                        <h3><i class="fa fa-angle-right"></i> <b><?php echo $row['fname']; ?>'sInformation</b> </h3>




                        <p align="center" style="color:#F00;"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                        <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                            <p style="color:#F00"><?php echo $_SESSION['msg']; ?><?php echo $_SESSION['msg'] = ""; ?></p>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">First Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control hoverable" name="fname" value="<?php echo $row['fname']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control hoverable" name="lname" value="<?php echo $row['lname']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email </label>
                                <div class="col-sm-10">
                                    <input id="email" type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Phone No. </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control hoverable" name="contact" value="<?php echo $row['Phone_no']; ?>">
                                </div>
                            </div>

                            <div class="update">
                                <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                        </form>
                    </section>

                <?php } ?>

                </section>
                <!-- <div class="wrapper fixed">
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