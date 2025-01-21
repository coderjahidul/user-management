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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $auth = new AuthController();
    $auth->updateProfile($id, $name, $email);
    
    echo "Profile updated successfully!";
}
?>
<?php include 'header.php'; ?>
<!-- <form method="POST">
    <input type="hidden" name="id" value="1">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Update</button>
</form> -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 25rem;">
        <h3 class="text-center mb-3">Profile</h3>
        <form method="POST">
            <input type="hidden" name="id" value="1">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
<?php include 'footer.php';