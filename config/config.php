<?php
$servername = "sql213.infinityfree.com";
$username = "if0_38542893";
$password = "4tWrnlEGxawGOrJ";
$db = "if0_38542893_laescena";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>