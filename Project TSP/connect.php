<?php
$servername = "localhost";
$username = "root";
$Password = "";
$dbname = "project tps";

// Create connection to database that already exists
$con = new mysqli($servername, $username, $Password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>