<?php
namespace App\Models;

class Auth extends Model
{
    public function __construct()
    {
        parent::__construct('users');
    }
    public function register($username, $email, $password)
    {
        $db = $this->db;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (user_name, email, password) VALUES (:username, :email, :password)");
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);

        return $db->lastInsertId();
    }

    public function authenticate($email, $password)
    {
        $db = $this->db;
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
