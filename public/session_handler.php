<?php 
session_start();
$timeout = 1800; // 30 minutes in seconds

if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$_SESSION['LAST_ACTIVITY'] = time();

// Redirect to login if the user is not authenticated
if (!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}