<?php

session_start();
if (isset($_POST['login'])) {
    include_once 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['logInUid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['logInPwd']);

    // Error handlers
    // Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header ("Location: ../signin/login.php?login=Empty");
        exit();
        
    } else {
        $sql = "SELECT * FROM users WHERE userName = '$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header ("Location: ../signin/login.php?login=Incorrect username or password");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // Dehashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_password']);
                if ($hashedPwdCheck == false) {
                    
                    
                    header ("Location: ../signin/login.php?login=error && err=$error");
                    exit();
                } elseif ($hashedPwdCheck == ture) {
                   
                    // Log in the user here
                    $_SESSION['u_id'] = $row['id'];
                    $_SESSION['u_first'] = $row['firstName'];
                    $_SESSION['u_last'] = $row['lastName'];
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['u_uid'] = $row['userName'];
                    header ("Location: ../blog/index.php?login=success");
                    exit();

                }
            }
        }
    }
}
else {
    header ("Location: ../blog/index.php?login=error");
    exit();
}