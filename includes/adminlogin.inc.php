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
        $sql = "SELECT * FROM admin WHERE email = '$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header ("Location: ../signin/login.php?login=Incorrect username or password");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // Dehashing the password
                
                if ($pwd != $row['pwd']) {
                    
                    
                    header ("Location: ../signin/login.php?login=error && err=$error");
                    exit();
                } elseif ($pwd == $row['pwd']) {
                   
                    // Log in the user here
                    $_SESSION['au_id'] = $row['id'];
                   $admin = $_SESSION['au_id'];
                    $_SESSION['au_email'] = $row['email'];
                    header ("Location: ../dashboard.php?login=success");
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