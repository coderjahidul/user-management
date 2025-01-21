<?php
require '../vendor/autoload.php';

use App\Controllers\AuthController;

$auth = new AuthController();
$user = $auth->getAuthenticatedUser();

if(!$user){
    // if no user is logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!-- <h1>Welcome, <?php //echo htmlspecialchars($user['name']); ?>!</h1>
<p>Email: <?php //echo htmlspecialchars($user['email']); ?></p>
<a href="logout.php">Logout</a> -->
<?php include 'header.php'; ?>
<div class="container my-5">
    <!-- left sidebar -->

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Welcome to Your Dashboard</h4>
        </div>
        <div class="card-body">
            <p>Hello, <strong><?php echo htmlspecialchars($user['name']); ?></strong>!</p>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <a href="profile.php" class="btn btn-secondary">Update Profile</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>