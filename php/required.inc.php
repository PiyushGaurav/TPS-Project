<?php
// define variables and set to empty values
$idErr = $passErr = $fnameErr = $lnameErr = $emailErr = $genderErr = $branchErr = "";
$id = $passward = $firstname = $lastname = $email = $gender = $branch = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST['id'])) {
    $idErr = "ID is required";
  } else {
  $id = $_POST['id'];   
  }
  
  if (empty($_POST['passward'])) {
    $passErr = "Passward is required";
  } else {
    $passward = $_POST['passward'];
  }

  if (empty($_POST['firstname'])) {
    $fnameErr = "First Name is required";
  } else {
    $firstname =$_POST['firstname'];
  }
  
  if (empty($_POST['lastname'])) {
    $lnameErr = "Last Name is required";
  } else {
    $lastname = $_POST['lastname'];
  }
  if (empty($_POST['email'])) {
    $emailErr = "Email is required";
  } else {
   $email = $_POST['email'];
  }
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $emailErr = "Invalid format and please re-enter valid email"; 
}

  if (empty($_POST['gender'])) {
    $genderErr = "Gender is required";
  } else {
 $gender = $_POST['gender'];
  }
  
  if (empty($_POST['branch'])) {
    $branchErr = "Branch is required";
  } else {
 $branch = $_POST['branch'];
  }
  
}
?>