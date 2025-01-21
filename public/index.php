<?php 
require '../vendor/autoload.php';

use App\Controllers\AuthController;

$auth = new AuthController();
$user = $auth->getAuthenticatedUser();

if(!$user){
    // if no user is logged in, redirect to login page
    header("Location: login.php");
    exit();
}else{
    header("Location: dashboard.php");
    exit();
}