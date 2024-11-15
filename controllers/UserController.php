<?php
require_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function create($username, $password, $email) {
        $this->user->username = $username;
        $this->user->password = password_hash($password, PASSWORD_BCRYPT);
        $this->user->email = $email;

        if ($this->user->create()) {
            echo "User was created.";
        } else {
            echo "Unable to create user.";
        }
    }
}