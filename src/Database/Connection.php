<?php
namespace App\Database;

use PDO;
use PDOException;

class Connection {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'user_management';
    protected $conn;

    protected function connect(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}