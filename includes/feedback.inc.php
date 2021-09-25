<?php 
ob_start(); 
require 'dbh.inc.php';

$view = $_POST['view'];
$name = $_POST['name'];
$comments = $_POST['comments'];
$email = $_POST['email'];
$num = $_POST['num'];


// $query = mysqli_query($conn, "INSERT INTO `feedback`(`fid`, `name`, `email`, `phone`, `feedback`, `suggestion`) VALUES ('','$name','$email','$num','$view','$comments')");
// echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';


		$sql ="INSERT INTO feedback( name, email, phone, feedback, suggestion) VALUES(?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
              header("location: ../feedback.php?error=sqlerror");
              exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $num, $view, $comments);
          mysqli_stmt_execute($stmt);
          echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
          exit();
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn); 
		
?>