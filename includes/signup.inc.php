<?php
    include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $job = mysqli_real_escape_string($conn, $_POST['job']);


    // Image uploading...
    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileError = $_FILES['fileToUpload']['error'];
    $fileType = $_FILES['fileToUpload']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if (fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
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
    
    $dir = '../uploads/'.$fileNameNew;
         if (!$fileName =='') {
            $img_dir = $dir;
        
    } else {
        
        $img_dir = '../uploads/profiledefault.png';
    }
    

    // Error handlers
    // Check for empty fields
    if (empty($first) || empty($last) || empty($uid) || empty($email) || empty($pwd) || empty($job)) {
        header("Location: ../signin/signin.php?signup=empty");
        exit();
    } else {
        // Check if input characters are valid
        if (!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last)) {
            header("Location: ../signin/signin.php?signup=invalid");
            exit();
        } else {
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signin/signin.php?signup=invalid email");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE userName='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    header("Location: ../signin/signin.php?signup=usertaken");
                    exit();
                } else {
                    // Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    // Insert the user into the database
                    $sql = "INSERT INTO users (firstName, lastName, userName, email, user_password, jobTitle, profilePic) 
                                        VALUES ('$first', '$last', '$uid'  , '$email', '$hashedPwd', '$job', '$img_dir');";
                    mysqli_query($conn, $sql);
                    header("Location: ../blog/index.php?signup=SUCCESS");
                    exit();
                }
            }
        }
    }


} else {
    header("Location: ../signin/signin.php");
    exit();
}

?>