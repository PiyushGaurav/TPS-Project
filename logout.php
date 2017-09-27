<?php
session_start();

if(isset($_SESSION['Username'])) {
    session_destroy();
    unset($_SESSION['Username']);
    unset($_SESSION['Password']);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>