<?php
// Include config file
session_start();
require_once "dbh.inc.php";
error_reporting(0);
if (isset($_POST['login'])) {
  header("Location: ../index.php");
  exit();
}
if (isset($_POST['Book'])) {
  $inputAddress = $_POST['inputAddress'];
  $S_date = $_POST['S_date'];
  $S_time = $_POST['S_time'];
  $vtype = $_POST['vtype'];
  $current_date = date("Y-m-d");
  $email = $_SESSION['email'];
  $destination = $_POST['destination'];
  echo $email;
  $date = $_POST['S_date'];
  $current_date = date("Y-m-d");


  $sql = "SELECT * FROM vehicle WHERE vtype=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, 's', $vtype);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($results);
    $vid = $row['vid'];
    $type = $row['vtype'];
  }
  $sql = mysqli_query($conn, "SELECT * FROM reserves where rdate='$date' and vtype='$type'");
  $res = mysqli_num_rows($sql);
  if ($res > 10) {
    header("Location: ../car.php?error=full");
    exit();
  }


  if (empty($inputAddress) || empty($S_date) || empty($S_time) || empty($vtype)) {
    header("Location: ../car.php?error=emptyfields");
    exit();
  } elseif ($S_date < $current_date) {
    echo '<p class="text-center alert alert-danger">Invalid Booking date provided. Please avoid using a past date.</p>';
    header("Location: ../car.php?error=invaliddate&inputAddress=" . $inputAddress);
    exit();
  } elseif ($S_date >= $current_date) {
    $sql = "INSERT INTO reserves(plocation, rdate, ptime, email, vid, vtype, bdate) VALUES ( '$inputAddress', '$S_date', '$S_time', '$email', '$vid', '$vtype', '$current_date');";
    mysqli_query($conn, $sql);
    header("Location: ../car.php?booking=success");
    exit();
  }

  mysqli_close($conn);
}
