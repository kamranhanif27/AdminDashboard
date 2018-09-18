

<?php
session_start();
if (isset($_POST['a-logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../dashboard.php? logged out");
    exit();
} else {
	header("Location: ../dashboard.php");
    exit();
}




?>