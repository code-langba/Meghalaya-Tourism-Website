
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Bookings | VisitMeg</title>
    <link rel="stylesheet" href="./cssss/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="./css/signup.css"> -->
</head>

<body>

    <div class="main-maincontainer">

     <!-- //*Header -->
     <?php
        require "./header.php";
        ?>
        <?php
require_once "includes/dbh.inc.php";
$email = $_SESSION['email'];

?>
<?php

if (isset($_GET['cid'])) {
    $adminid = $_GET['cid'];
    $status = "1";
    $msg = mysqli_query($conn, "UPDATE `reserves` set status='$status' where rid='$adminid'");
    if ($msg) {
        echo "<script>alert('Booking canceled');</script>";
    }
}
else if (isset($_GET['hid'])) {
    $adminid = $_GET['hid'];
    $status = "1";
    $msg = mysqli_query($conn, "UPDATE `reservations` set status='$status' where rid='$adminid'");
    if ($msg) {
        echo "<script>alert('Booking canceled');</script>";
    }
}
else if (isset($_GET['pid'])) {
    $cdate = date_create($_GET['date']);
    $adminid = $_GET['pid'];
    $current = date_create(date("Y-m-d"));
    $status = "1";
    $days = date_diff($cdate, $current);
    $no = $days->format("%a");
    if($no < 30){
    $msg = mysqli_query($conn, "UPDATE `purchases` set status='$status' where pid='$adminid'");
    if ($msg) {
        echo "<script>alert('Booking canceled');</script>";
        }
    }else{
        echo "<script>alert('Cancel Not Possible');</script>";}
}
?>

        <!--Tour Bookings -->
        <div id="user-bookings">
            <section class="bookwrap" id="mytours">
                <!-- <div class="row">



                <div class="col-md-12">
                    <div class="content-panel"> -->
                <div class="tablebook">
                    <div class="table-label">
                        <h3>My Tour Bookings</h3>

                        <h4>Tour booking Details </h4>
                    </div>
                    <table class="table ">


                        <!-- <hr> -->
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Tour-Start-Date</th>
                                <th>Tour Name</th>
                                <th>Number of rooms</th>
                                <th>Number of Travelers</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ret = mysqli_query($conn, "SELECT * FROM purchases WHERE email='$email'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) { ?>
                                <tr id="trow">
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['tsdate']; ?></td>
                                    <td><?php echo $row['tname']; ?></td>
                                    <td><?php echo $row['noofroom']; ?></td>
                                    <td><?php echo $row['nooftraveler']; ?></td>
                                    <td><?php
                                            if ($row['status'] == 0) {
                                                echo "Not confirmed";
                                            } else if ($row['status'] == 1) {
                                                echo "canceled";
                                            } else if ($row['status'] == 2) {
                                                echo "Confirmed";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                    <a href="mybookings.php?pid=<?php echo $row['pid']; ?>&date=<?php echo $row['bdate']?>">
                                        <button style="background:dodgerblue; color:white; width:100%; height:40px;" class="btn btn-danger btn-xs" onClick="return confirm('Do you want to Cancel');">Cancel</button></a>
                                </td>
                                </tr>
                            <?php $cnt = $cnt + 1;
                            } ?>

                        </tbody>
                    </table>
                </div>

                <!-- </div>
                </div>
            </div> -->
            </section>
            <!-- </section
  ></section> -->

            <!--Car Reservation -->
            <!-- <section id="main-content"> -->
            <section class="bookwrap"  id="mycars">
                <!-- <div class="row">



                <div class="col-md-12">
                    <div class="content-panel"> -->
                <div class="tablebook">
                    <div class="table-label">
                        <h3> <i class="fa fa-angle-right"></i>My Car Bookings</h3>
                        <h4><i class="fa fa-angle-right"></i> All car booking Details </h4>
                    </div>
                    <table class="table">


                        <!-- <hr> -->
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Car Type</th>
                                <th>Pickup Location</th>
                                <th>Pickup time</th>
                                <th>Reservation Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ret = mysqli_query($conn, "SELECT * FROM reserves WHERE email='$email'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) { ?>
                                <tr id="trow">
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['vtype']; ?></td>
                                    <td><?php echo $row['plocation']; ?></td>
                                    <td><?php echo $row['ptime']; ?></td>
                                    <td><?php echo $row['rdate']; ?></td>
                                    <td><?php
                                            if ($row['status'] == 0) {
                                                echo "Not confirmed";
                                            } else if ($row['status'] == 1) {
                                                echo "canceled";
                                            } else if ($row['status'] == 2) {
                                                echo "Confirmed";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                    <a href="mybookings.php?cid=<?php echo $row['rid']; ?>&date=<?php echo $row['rdate']?>">
                                        <button style="background:dodgerblue; color:white; width:100%; height:40px;" class="btn btn-danger btn-xs" onClick="return confirm('Do you want to Cancel');">Cancel</button></a>
                                </td>
                                </tr>
                            <?php $cnt = $cnt + 1;
                            } ?>

                        </tbody>
                    </table>
                </div>

                <!-- </div>
                </div>
            </div> -->
                <!-- </section> -->
            </section>
            <!-- Hotel Reservations -->
            <!-- <section id="main-content"> -->
            <section class="bookwrap"  id="myhotel">
                <!-- <div class="row"> -->


                <!-- 
                <div class="col-md-12">
                    <div class="content-panel"> -->
                <div class="tablebook">
                    <div class="table-label">
                        <h3><i class="fa fa-angle-right"></i> My Hotel Bookings</h3>
                        <h4><i class="fa fa-angle-right"></i> All hotel booking Details </h4>

                    </div>
                    <table class="table">

                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Hotel Name</th>
                                <th>Check in Date</th>
                                <th>Check out Date</th>
                                <th>No of room</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ret = mysqli_query($conn, "SELECT * FROM reservations WHERE email='$email'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) { ?>
                                <tr id="trow">
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['hname']; ?></td>
                                    <td><?php echo $row['cindate']; ?></td>
                                    <td><?php echo $row['coutdate']; ?></td>
                                    <td><?php echo $row['rooms']; ?></td>
                                    <td><?php
                                            if ($row['status'] == 0) {
                                                echo "Not confirmed";
                                            } else if ($row['status'] == 1) {
                                                echo "canceled";
                                            } else if ($row['status'] == 2) {
                                                echo "Confirmed";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                    <a href="mybookings.php?hid=<?php echo $row['rid']; ?>">
                                    <button style="background:dodgerblue; color:white; width:100%; height:40px;" class="btn btn-danger btn-xs" onClick="return confirm('Do you want to Cancel');">Cancel</button></a>
                                </td>
                                </tr>
                            <?php $cnt = $cnt + 1;
                            } ?>

                        </tbody>
                    </table>
                </div>

                <!-- </div>
                </div>
            </div> -->
                <!-- </section> -->
            </section>

        </div>
        <div class="fixed">
            <a href="#mytours">My Tours</a>
            <a href="#mycars">Car Bookings</a>
            <a href="#myhotel">Hotel Bookings</a>
        </div>
<!-- //*Footer  -->
<?php
        include "./footer.php";
        ?>

        <!-- //? End Footer  -->
    </div>


</body>

</html>