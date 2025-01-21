<?php
require '../vendor/autoload.php';

use App\Controllers\AuthController;

// Handle logout
$auth = new AuthController();
$auth->logoutUser();

header("Location: login.php"); // Redirect to login page
exit();
?>