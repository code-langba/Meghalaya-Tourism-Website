<?php
if(isset($_POST['login-submit'])){
    require_once 'dbh.inc.php';
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfield");
        exit();
    }
    else{
        $sql = "SELECT * FROM user WHERE email=?;";
        $stmt =mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($results)) {
                $pwdcheck = password_verify($password, $row['upassword']);
                if ($pwdcheck == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                elseif ($pwdcheck == true) {
                    session_start();
                    $_SESSION['email'] = $row['email'];
                    header("Location: ../index.php?login success");
                    exit();
                }
                else{
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }

                    }
            else {
                header("Location: ../index.php?error=nouser");
            exit();
            }
        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}