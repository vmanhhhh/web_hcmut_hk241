<?php
require_once '../controllers/UserController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $userController = new UserController();
            $userController->create($username, $password, $email);
        } else {
            require_once '../views/register.php';
        }
        break;
    default:
        echo "Welcome to the home page!";
        break;
}
