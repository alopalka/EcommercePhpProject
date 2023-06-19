<?php
$servername = "localhost";
$dbname = "smietnik";
$username = 'root';
$password = 'Password123!@#';
$connection = mysqli_connect($servername, $username, $password) or die(mysqli_error());
$database = mysqli_select_db($connection, $dbname) or die(mysqli_error($connection));

$dbDsn = 'mysql:host='.$servername.';dbname='.$dbname.';charset=UTF8';
$dbPrefix = '';
$dbOptions = null;
?>