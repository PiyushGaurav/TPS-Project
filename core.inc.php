<?php
ob_start();
session_start();
$Currentfile  = $_SERVER['SCRIPT_NAME'];
$http_referer="";

if(isset($_SERVER['HTTP_REFERER'])) {
  //do what you need to do here if it's set 
    $http_referer = $_SERVER['HTTP_REFERER'];
   }


?>