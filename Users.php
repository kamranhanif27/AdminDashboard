<?php 
include_once 'includes/dbh.inc.php';

        $user = $_GET['uid'];
        $select = mysqli_query($conn,"SELECT firstName, lastName, userName, email, profilePic FROM users WHERE id=$user");
        $fetch = mysqli_fetch_assoc($select);
        $firstName = $fetch['firstName'];
        $lastName = $fetch['lastName']; 
        $userName = $fetch['userName']; 
        $email = $fetch['email']; 
        $profilePic = $fetch['profilePic']; 
        if (isset($_POST['deleteBtn'])) {
            $select = mysqli_query($conn,"DELETE FROM users WHERE id=$user");

            echo '<script> alert ("Updated");</script>' ;
            header("Location: ../profiles.php");
            exit();

        }
        if (isset($_POST['updateBtn'])) {
            // Image uploading...
    
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);

   
        $select = mysqli_query($conn,"UPDATE users SET  firstName='$firstName', email='$email', lastName='$lastName', userName ='$uid' WHERE id=$user");

        // echo '<script> alert ("Updated");</script>' ;
     
        }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); include 'includes/sidebar.php'; ?>
        </div>
    </div>
    <div class="main-panel">
        <div class="header">

            <?php $x = basename (__FILE__, '.php'); include 'includes/header.php'; ?>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="TiyanSoft Inc.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="uid" type="text" class="form-control" placeholder="Username" value="<?php echo $userName ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input name="firstName" type="text" class="form-control" placeholder="Company" value="<?php echo $firstName; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="<?php echo $lastName ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="updateBtn"class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <button type="submit" name="deleteBtn"class="btn btn-danger btn-fill pull-left">Delete Profile</button>
                                    <div class="clearfix"></div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="card card-user">
                                <div class="image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                </div>
                                <div class="content">
                                    <div class="author">
                                            
                                        <img class="avatar border-gray" onclick="get()" src="<?php echo $profilePic;?>" alt="..."/><br>
                                        
                                        <br>
                                        <form action="includes/proChange.inc.php?user=<?php echo $user; ?>" method="POST" enctype="multipart/form-data">
                                            <button type="submit" name="changePic"  class="btn btn-danger btn-fill btn-xs">Change Profile Pic</button>
                                            <input type="file" name="img" id="proPic" style="display: none;">
                                        </form>
                                        <hr>
                                          <h4 class="title"><?php echo $firstName ?><br />
                                             <small name="uid"><?php echo $userName;?></small>
                                          </h4>
                                        
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                    <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                    <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="footer">
            <?php include 'includes/footer.php'; ?>
        </div>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
    <script type="text/javascript">
        
        function get(){
            document.getElementById('proPic').click();
        }
    </script>

</html>
