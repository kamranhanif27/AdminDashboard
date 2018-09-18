<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "blogdb";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword);
mysqli_select_db($conn , 'blogdb');