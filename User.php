<?php

 class User {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }
    public function register($surname , $email , $passwrd ) : bool {
        try {
            $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);

            $hashedPassword = password_hash($passwrd, PASSWORD_BCRYPT);
            
            $stmt->bindParam(':username', $surname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            $result = $stmt->execute();
            
            if ($result) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("Registration execute failed: " . print_r($errorInfo, true));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Registration PDO error: " . $e->getMessage());
            throw $e; 
        }
    }

    public function login($email, $passwrd) : bool {
        $query = "SELECT id, username, email, dateofbirth, password FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($passwrd, $row['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                return true;
            }
        }
        return false;
    }
 }
?>