<?php
include_once 'dbh.inc.php';


session_start();
$id_u = $_SESSION['u_id'];
if (isset($_POST['post'])) {

    
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Image uploading...
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if (fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
    $dir = 'uploads/'.$fileNameNew;
    // if ('/postImg/'.$fileNameNew > 0) {
    //     $dir = '/postImg/'.$fileNameNew;
    // } else {
    //     $dir = '/postImg/postdefault.png';
    // }

            $sql = "INSERT INTO posts (title, tag, category, content, user_id, image) 
            VALUES ('$title', '$tags', '$category', '$content', '$id_u', '$dir')";
            mysqli_query($conn, $sql);
            header("Location: ../blog/index.php?post=Posted");
            exit();
        }
    
