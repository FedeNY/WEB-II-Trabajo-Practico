<?php

require_once 'app/controller/nav_controller.php';
require_once 'app/controller/home_controller.php';
require_once 'app/controller/category_controller.php';
require_once 'app/controller/detail_controller.php';
require_once 'app/controller/admin_controller.php';
require_once 'app/controller/admin_add_controller.php';
require_once 'app/controller/admin_edit_controller.php';

require_once 'app/middleware/verify_session.php';
require_once 'libs/response.php';
require_once 'app/controller/login_controller.php';
require_once 'app/controller/register_controller.php';

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));

$res = new Response();


$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// Si el usuario pasa por login no se ejecuta el nav

if ($params[0] !== 'showLogin' && $params[0] !== 'showRegister') {
    sessionAuthMiddleware($res, true);
    $navcontroller = new NavCategoryController();
    $navcontroller->getBrands();
}

switch ($params[0]) {

    case 'home':
        $controller = new HomeController();
        $controller->getProductsHome();
        break;

    case 'category':
        if (isset($params[1]) && !empty($params[1])) {
            $controller = new CategoryController();
            $controller->getProductFilter($params[1]);
        } else {
            $controller = new CategoryController();
            $controller->getProductFilter(null);
        }
        break;

    case 'detail':
        $controller = new DetailController();
        $controller->getDetailProduct($params[1]);
        break;

    case 'admin':
        sessionAuthMiddleware($res, false);
        if (isset($res->user->rol) && $res->user->rol == 'admin') {
            if (isset($params[1]) && !empty($params[1])) {
                $controller = new AdminAddController();
                $controller->showToolAdd();
            } else {
                $controller = new AdminController();
                $controller->showAdminProduct();
            }
        } else {
            echo ('404 Page not found');
        }
        break;
    case 'add':
        sessionAuthMiddleware($res, false);
        if (isset($res->user->rol) && $res->user->rol == 'admin') {
            $controller = new AdminAddController();
            $controller->sendProduct();
        } else
            echo ('No tienes los permisos suficientes para acceder a esta seccion');
        break;

    case 'addBrand':
        $controller = new AdminController;
        $controller->createBrand();
        break;

    case 'deleteBrand':
        $controller = new AdminController;
        $controller->deleteBrand();
        break;

    case 'edit':
        $controller = new AdminEditController();
        $controller->showEditProduct($params[1]);
        break;

    case 'delete':
        $controller = new AdminEditController();
        $controller->deleteAdminProduct($params[1]);;
        break;

    case 'update':
        $controller = new AdminEditController();
        $controller->updateAdminProduct($params[1]);;
        break;

    case 'showLogin':
        $controller = new UserController();
        $controller->showlogin();
        break;
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;

    case 'logout':
        $controller = new UserController();
        $controller->logOut();
        break;

    case 'showRegister':
        $controller = new RegisterController;
        $controller->showRegister();
        break;

    case 'register':
        $controller = new RegisterController;
        $controller->register();break;

    case 'buy' :
        sessionAuthMiddleware($res, false);
        $controller = new HomeController();
        $controller->getProductsHome();
        break;
    default:
        echo ('404 Page not found');
        break;
}
