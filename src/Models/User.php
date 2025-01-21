<?php 
namespace App\Models;

use App\Database\Connection;
use PDO;

class User extends Connection {
    private $id;
    private $name;
    private $email;
    private $password;

    public function register($name, $email, $password){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);
    }

    public function login($email, $password){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            return $user;
        }
        return false;
    }

    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($id, $name, $email){
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'id' => $id
        ]);
    }
}