<?php

include_once 'includes/dbh.inc.php';


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
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style type="text/css">
        *, h3  {
            margin: 0;
            padding: 0;
            border: 0;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

    <div class="sidebar-wrapper">
        <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); include 'includes/sidebar.php'; ?>
    </div>
    	
    </div>

    <div class="main-panel">

        <div class="header">
            <?php $x = basename(__FILE__, '.php'); include 'includes/header.php'; ?>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of User Accounts</h4>
                                <p class="category">Here is the important details about user profiles</p>
                            </div>
                            <div class="content">
                                <!-- <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Title</th>
                                    	<th>Content</th>
                                    	<th>Image</th>
                                        <th>Tags</th>
                                        <th>Category</th>
                                        <th>Publish Date</th>
                                    	<th>Publisher</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                   
                                            // $select = "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id  ";
                                            // $result = mysqli_query($conn, $select);
                                            // if (mysqli_num_rows($result) > 0) {
                                            // while ($row = mysqli_fetch_assoc($result)) {
                                            //     // $id = $row["id"];
                                            //     // $u_id = $row['user_id'];

                                            // echo '
                                            //     <tr>
                                            //         <td>', $row["id"], '</td>
                                            //         <td><a>', $row["title"], '</a></td>
                                            //         <td>', $row["content"], ' </td>
                                            //         <td>', $row["image"], ' </td>
                                            //         <td>', $row["tag"], ' </td>
                                            //         <td>', $row["category"], ' </td>
                                            //         <td>', $row["publishDate"], ' </td>
                                            //         <td>', $row["firstName"], " ", $row["lastName"], ' </td>
                                            //         </tr>
                                            //         ';
                                                   
                                            //     }
                                            // }
                                           



                                        
                                            
                                        ?>
                                        
                                    </tbody>
                                </table>
 -->

 <!-- Post Card -->
                    

<?php

$sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $postPic = $row["image"];
                        $accid = $row["post_id"];
                        
                      echo ' 

                      <!-- Post Card -->
                    <div class="card my-4">
                      <div class="card-body" style="padding: 10px;">
                        <h3 >', $row["title"], '</h3>
                        <p style="font-size: 80%">
                         ',$row["id"],' : Posted on ', $row["publishDate"],' by ', $row["firstName"], '
                        </p>
                        <div class="media">
                          <div class="media-left">
                            <img src="', $postPic, '" class="media-object mr-3" style="width:100px">
                          </div>
                          <div class="media-body">
                            <p>', $row["content"], '</p>
                          </div>
                        </div>
                        <form action="includes/postDelete.inc.php" method="POST">
                        <input name="account_id" value="',$accid,'" type="hidden" class="form-control">
                        <button style="margin-top:20px;" name="deleteBtn" class="btn btn-success pull-right" >Delete</button>
                        <div class="clearfix"></div>
                        </form>

                      </div>
                    </div>

                      ';
                      
                        }
                    }
                    
                         


  ?>
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
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
