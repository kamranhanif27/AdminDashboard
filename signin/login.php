<?php 
session_start();  
 
if (!isset($_SESSION['u_id'])) {
    echo '

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Log In!</title>
</head>
<body>
    <div class="container">
        <div class="signinform">
            <div id="error-div" style="display:none;"><h5>Fill in all the fields!</h5></div>
            <form name="loginform" action="../includes/login.inc.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="logInInputUid">Username:</label>
                <input name="logInUid" type="text" class="form-control" id="logInInputUid" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="logInInputPwd">Password:</label>
                <input name="logInPwd" type="password" class="form-control" id="logInInputPwd" placeholder="Password">
            </div>
                <button id="loginbtn" name="login" type="submit" class="btn btn-success">Log in</button>
            </form>
            <a class="btn btn-info mt-3" style="text-decoration: none; color: white;" href="adminlogin.php">Log in as Admin</a>
        </div>
    </div>



    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>


    ';
} else {
    header ("Location: ../blog/index.php");
    exit();
}
