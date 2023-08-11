<?php
$servername = "localhost:3308";
$username = "root";
$password = '';
$db='laptopdb';

// Create connection
$connection = new mysqli($servername, $username, $password,$db);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>
