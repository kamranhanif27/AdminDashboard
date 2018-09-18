<?php

include_once 'dbh.inc.php';


session_start();

if(isset($_POST['deleteBtn'])){
                    $pId = $_POST['account_id']; 

                    mysqli_query($conn, "DELETE FROM posts WHERE post_id=$pId");
                    header("Location: ../Posts.php");
                    exit();
                    }