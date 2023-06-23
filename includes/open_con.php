<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_database = 'smietnik';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

define('DB_CONNECTION', $conn);
?>