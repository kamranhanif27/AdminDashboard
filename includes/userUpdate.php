<?php 

include_once 'includes/dbh.inc.php';
if (isset($_POST['updateBtn'])) {
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
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);

   
        $select = mysqli_query($conn,"UPDATE users SET profilePic='$img_dir', firstName='$firstName', email='$email', lastName='$lastName', userName ='$uid' WHERE id=$user");

        // echo '<script> alert ("Updated");</script>' ;
     
        }

?>