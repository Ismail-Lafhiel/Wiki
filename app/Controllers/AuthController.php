<?php
namespace App\Controllers;

use App\Models\Auth;

class AuthController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = new Auth();
    }
    public function signin()
    {
        return $this->render('auth.signin');
    }
    public function signup()
    {
        return $this->render("auth.signup");
    }
    public function register()
    {
        $username = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $response = $this->auth->register($username, $email, $password);

        if ($response) {
            echo json_encode(['successMessage' => "User registered successfully"]);
        } else {
            echo json_encode(['errorMessage' => "User registration failed"]);
        }
        header('Content-Type: application/json');
    }

    public function authenticate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Call the authenticate method from the Auth model
        $user = $this->auth->authenticate($email, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            echo json_encode(['successMessage' => 'Login successful']);
            // dump($_SESSION['user']);
        } else {
            echo json_encode(['errorMessage' => 'Invalid email or password']);
        }
        header('Content-Type: application/json');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /");
    }
}
