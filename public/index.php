<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/database.php';
require_once '../controllers/AuthController.php';
require_once '../controllers/MediaController.php';
require_once '../controllers/AdminController.php';

$page = $_GET['page'] ?? 'login';

$authController = new AuthController($pdo);
$mediaController = new MediaController($pdo);
$adminController = new AdminController($pdo);

switch ($page) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->showLogin();
        }
        break;
    case 'signup':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->signup();
        } else {
            $authController->showSignup();
        }
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'home':
        $mediaController->showHome();
        break;
    case 'admin':
        $adminController->showAdminPanel();
        break;
    case 'admin_update_role':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminController->updateRole();
        } else {
            $adminController->showAdminPanel();
        }
        break;
    default:
        $authController->showLogin();
}
?>