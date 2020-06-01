<?php
$databaseHost = 'localhost';
$databaseName = 'dbms';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
}
?>
