<?php
if (isset($_POST['login-submit'])) {
    require 'productdb.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../header.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../header.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../header.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: ../header.php?login=success");
                    exit();
                } else {
                    header("Location: ../header.php?error=nouser");
                    exit();
                }
            } else {
                header("Location: ../header.php?error=nouser");
                exit();
            }
        }
    }
} 
else {
    header("Location: ../header.php?error=accessdenied");
    exit();
}
