<?php
require_once 'controllers/UserController.php';

$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

switch($controller) {
    case 'user':
        $userController = new UserController();
        switch($action) {
            case 'list':
                $userController->list();
                break;
            case 'form':
                $userController->form($id);
                break;
            case 'save':
                $userController->save($_POST);
                break;
            case 'delete':
                $userController->delete($id);
                break;
            default:
                echo "Ação inválida.";
                break;
        }
        break;

    default:
        echo "Controller inválido.";
        break;
}
