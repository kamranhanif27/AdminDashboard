<?php
include_once 'dbh.inc.php';
if (isset($_POST['changePic'])) {
	$user_id = $_GET['user'];
	$fileName = $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
   
                $fileDestination = '../uploads/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
  
    
   // $dir = '../uploads/'.$fileName;
   $dir = '../uploads/'.$fileName;
         if (!$fileName =='') {
            $img_dir = $dir;
        
    } else {
        
        $img_dir = '../uploads/profiledefault.png';
    }

    $select = mysqli_query($conn,"UPDATE users SET profilePic='$img_dir' WHERE id=$user_id");
    header("Location: ../Users.php?uid=$user_id");
    exit();

}

?>