<?php
require_once 'models/User.php';

class AuthController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function showLogin() {
        include 'views/login.php';
    }

    public function showSignup() {
        include 'views/signup.php';
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Server-side validation
        if (empty($email) || empty($password)) {
            echo "All fields are required.";
            return;
        }

        $user = $this->user->login($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: index.php?page=home");
        } else {
            echo "Invalid credentials.";
        }
    }

    public function signup() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Server-side validation
        if (empty($username) || empty($email) || empty($password)) {
            echo "All fields are required.";
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            return;
        }
        if (strlen($password) < 6) {
            echo "Password must be at least 6 characters.";
            return;
        }

        if ($this->user->register($username, $email, $password)) {
            header("Location: index.php?page=login");
        } else {
            echo "Registration failed.";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?page=login");
    }
}
?>