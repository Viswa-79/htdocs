<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$databasename = 'credence';
$conn = mysqli_connect($hostname, $username, $password, $databasename);

if (!$conn) {
    die("Database Connection Failed" . mysqli_error($conn));
}
?>