<?php
//require_once './app/controller/NoticiasController.php';
require_once './app/controller/CategoriasController.php';

/** TABLA DE RUTEO
 * 
 * listar           ->     TaskController->showTasks()
 * nueva            ->     TaskController->addTask();
 * eliminar/:ID     ->     TaskController->removeTask($id)
 * finalizar/:ID    ->     TaskController->finalizeTask($id)
 * login            ->     AuthController->showLogin()
 * 
 */


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
// accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/',$action);
switch ($params[0]) {
    case 'home':
        $controller = new CategoriasController();
        $controller->showCategorias();
        break;
    case 'mostrarCategoria':
       $controller = new CategoriasController();
        $id = $params[1];
        $controller->mostrarCategoria($id);
        break;
    case 'eliminarCategoria':
        $controller = new CategoriasController();
        $id =  $_POST['id_categoria'];
        $controller->removeCategoria($id);
        break;
        /*
    case 'mostrarCategoria':
        $controller = new TaskController();
        $controller->addTask();
        break;
    case 'eliminar':
        $controller = new TaskController();
        $id = $params[1];
        $controller->removeTask($id);
        break;
    case 'finalizar':
        $controller = new TaskController();
        $id = $params[1];
        $controller->finalizeTask($id);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    default: 
        echo "404 Page Not Found";*/
    }