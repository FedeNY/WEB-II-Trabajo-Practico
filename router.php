<?php

include 'app/controller/home_controller.php';
include 'app/controller/product_controller.php';
/* include 'app/controller/detail_controller.php'; */

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));


// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}


// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {

    case 'home':
        $controller = new HomeController();
        $controller->getProductsHome();
        break;
    case 'product':
        $controller = new ProductController();
        $controller->getProductFilter();
        break;
    case 'filter':
        $controller = new ProductController();
        $controller->getProductFilter();
        break;

    default:
        echo ('404 Page not found');
        break;
}
