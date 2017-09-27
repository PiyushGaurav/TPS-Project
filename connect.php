<?php

$Username = $Password = "";

$servername = "localhost";
$username = "root";
$Password = "";
$dbname = "training project";

// Create connection to database that already exists
$conn = new mysqli($servername, $username, $Password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>