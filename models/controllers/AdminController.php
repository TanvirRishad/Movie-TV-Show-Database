<?php
require_once 'models/User.php';

class AdminController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function showAdminPanel() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }
        $users = $this->user->getAllUsers();
        include 'views/admin.php';
    }

    public function updateRole() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }
        $userId = $_POST['user_id'] ?? '';
        $role = $_POST['role'] ?? '';

        if (empty($userId) || !in_array($role, ['user', 'admin'])) {
            echo "<div class='alert alert-danger'>Invalid input.</div>";
            $users = $this->user->getAllUsers();
            include 'views/admin.php';
            return;
        }

        if ($this->user->updateRole($userId, $role)) {
            echo "<div class='alert alert-success'>Role updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to update role.</div>";
        }
        $users = $this->user->getAllUsers();
        include 'views/admin.php';
    }
}
?>