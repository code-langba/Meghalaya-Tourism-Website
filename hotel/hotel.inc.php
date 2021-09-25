<?php
session_start();
require_once "dbh.inc.php";
#include "../var.php";
error_reporting(0);
$rid = $_SESSION['rid']; 
if(isset($_POST['checkin'])) {
        $checkin = $_POST['in_date'];
        $checkout = $_POST['out_date'];
        $email = $_SESSION['email'];
        $rname = $_POST['rname'];
        $rooms = $_POST['rooms'];
        $current_date = date("Y-m-d");
        $hname = $_SESSION['hname'];
        $bdate = date("Y-m-d");
        $rms = $_SESSION['roomnumber'];
        
    if(!empty($_POST['in_date']) && !empty($_POST['out_date']) && !empty($_POST['rooms']) ){
        
        if($checkin >= $current_date){
             if($checkout >= $checkin){
                   $insert = "INSERT INTO reservations(rid,  cindate, coutdate, email, hname, rooms, rname, bdate) VALUES (NULL, '$checkin', '$checkout', '$email', '$hname', '$rooms', '$rname', '$bdate');";
                    mysqli_query($conn, $insert);
                     $newRooms = $rms - $rooms;
                    if($newRooms <= 0){
                      $newRooms = 0;
                    }
                    mysqli_query($conn, "UPDATE roomtype SET noofroom='$newRooms' WHERE hname = '$hname'  OR  rname ='$rname';");
                    header("Location: ./rooms.php?booking=success&hname=".$hname);
                    mysqli_close($conn);
                    exit();
            }
          else {
            echo '<p class="text-center alert alert-danger">Invalid Check-out date provided. Please avoid using a past date.</p>';
            header("Location: ./rooms.php?error=invalidcheckoutdate&hname=".$hname);
          }
      } 
      else {
        echo '<p class="text-center alert alert-danger">Invalid Check-in date provided. Please avoid using a past date.</p>';
        header("Location: ./rooms.php?error=invalidcheckindate&hname=".$hname);
      }
    }
    else
    {
        
        header("Location: ./rooms.php?error=emptyfields&hname=".$hname);
       
    }
    
    }

?>