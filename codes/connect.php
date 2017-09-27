<?php

$User_id = $Password = $First_Name = $Last_Name = $Email_id = $Gender = $Department = $Designation = "";

$servername = "localhost";
$username = "root";
$Password = "";
$dbname = "railway_data";

// Create connection to database that already exists
$conn = new mysqli($servername, $username, $Password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>