<?php
require_once 'controllers/UserController.php';
require_once 'controllers/ColorController.php';

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
   
    case 'color':
        $colorController = new ColorController();
        switch($action) {
            case 'list':
                $colorController->list();
                break;
            case 'form':
                $colorController->form($id);
                break;
            case 'save':
                $colorController->save($_POST);
                break;
            case 'delete':
                $colorController->delete($id);
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
