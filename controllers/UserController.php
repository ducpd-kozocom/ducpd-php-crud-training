<?php
require_once 'models/User.php';
require_once 'config/Database.php';

class UserController
{
    private $user;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->user = new User($db);
    }

    public function index()
    {
        $users = $this->user->getAll();
        require 'views/users/index.php';
    }

    public function create()
    {
        $formType = 'create';
        $pageTitle = 'Create User';
        require 'views/users/form.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->address = $_POST['address'];
            $this->user->phone = $_POST['phone'];

            if ($this->user->create()) {
                header("Location: index.php?action=index");
            } else {
                echo "Error creating user.";
            }
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $this->user->id = $_GET['id'];
            if ($this->user->getById()) {
                $formType = 'edit';
                $pageTitle = 'Edit User';
                require 'views/users/form.php';
            } else {
                echo "User not found.";
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->id = $_POST['id'];
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->address = $_POST['address'];
            $this->user->phone = $_POST['phone'];

            if ($this->user->update()) {
                header("Location: index.php?action=index");
            } else {
                echo "Error updating user.";
            }
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->user->id = $_GET['id'];

            if ($this->user->delete()) {
                header("Location: index.php?action=index");
            } else {
                echo "Error deleting user.";
            }
        }
    }
}
