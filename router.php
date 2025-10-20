<?php
//require_once './app/controller/NoticiasController.php';
require_once './app/controller/CategoriasController.php';
require_once './app/controller/auth.controller.php';
require_once './app/middlewares/session.middleware.php';
require_once './app/middlewares/guard.middleware.php';


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

session_start();

$action = 'home'; // accion por defecto si no se envia ninguna
// accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/',$action);
$request = new StdClass();
$request = (new SessionMiddleware())->run($request);

switch ($params[0]) {
    case 'home':
        $controller = new CategoriasController();
        $controller->showCategorias($request);
        $controller = new NoticiasController();
        $controller->showNoticias();
        break;
    case 'mostrarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoriasController();
        $request->id= $params[1];
        $controller->mostrarCategoria($request);
        break;
    case 'eliminarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoriasController();
        $request->id=  $_POST['id_categoria'];
        $controller->removeCategoria($request);
        break;
    case 'agregarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoriasController();
        $controller->agregarCategoria($request);
        break;
    case'modificarCategoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoriasController();
        $request->id=  $_POST['id_categoria'];
        $controller->modificarCategoria($request);
        break;
        case 'mostrarNoticia':
            $controller = new NoticiasController();
            $id = $params[1];
            $controller->mostrarNoticia($id);
            break;
        case 'eliminarNoticia':
            $controller = new NoticiasController();
            $id =  $_POST['id_categoria'];
            $controller->removeNoticia($id);
            break;
        case 'agregarNoticia':
            $request = (new GuardMiddleware())->run($request);
            $controller = new NoticiasController();
            $controller->agregarNoticia($request);
            break;
        case'modificarNoticia':
            $request = (new GuardMiddleware())->run($request);
            $controller = new NoticiasController();
            $request->id=  $_POST['id_categoria'];
            $controller->modificarNoticia($request);
            break;
    case 'logearse':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
     case 'do_register':
        $controller = new AuthController();
        $controller->registrar($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = new AuthController();
        $controller->logout($request);
        break;

    default: 
        echo "404 Page Not Found";
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