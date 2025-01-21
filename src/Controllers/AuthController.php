<?php
namespace App\Controllers;
use App\Models\User;

class AuthController {
    public function registerUser($name, $email, $password){
        $user = new User();
        $user->register($name, $email, $password);
    }

    public function loginUser($email, $password){
        $user = new User();
        $authenticatedUser = $user->login($email, $password);

        if($authenticatedUser){
            // Start session and store user data
            session_start();
            $_SESSION['user'] = [
                'id' => $authenticatedUser['id'],
                'name' => $authenticatedUser['name'],
                'email' => $authenticatedUser['email']

            ];
            return true;
        }
        return false;
    }

    public function logoutUser(){
        session_start();
        session_unset(); // Clear session data
        session_destroy(); // Destroy the session
    }

    public function updateProfile($id, $name, $email){
        $user = new User();
        $user->updateProfile($id, $name, $email);
    }

    public function getAuthenticatedUser(){
        session_start();
        return $_SESSION['user'] ?? null;
    }
}