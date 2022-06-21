<?php
session_start();
if(isset($_SESSION['loggedin'])) {
    session_destroy();
    unset($_SESSION['loggedin']);
    header('location:index.php'); 
}
?>