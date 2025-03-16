<?php
// Include controller
require_once 'controllers/UserController.php';

// Initialize controller
$controller = new UserController();

// Router
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Call appropriate method based on action
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}
