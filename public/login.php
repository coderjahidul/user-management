<?php 
require '../vendor/autoload.php';
use App\Controllers\AuthController;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new AuthController();
    $user = $auth->loginUser($email, $password);

    if($user){
        header("Location: dashboard.php");
        exit();
    }else{
        echo "Invalid login credentials.";
    }
}
?>

<!-- <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form> -->
<?php include 'header.php'; ?>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 25rem;">
        <h3 class="text-center mb-3">Login</h3>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">
            Don't have an account? <a href="register.php">Register</a>
        </p>
    </div>
</div>
<?php include 'footer.php'; ?>