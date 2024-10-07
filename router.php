<?php

include 'app/controller/home_controller.php';
/* include 'app/controller/category_controller.php'; */
include 'app/controller/nav_controller.php';


define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));


// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}


// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción


$navcontroller = new NavCategoryController();
$navcontroller->getBrands();


switch ($params[0]) {

    case 'home':
        $controller = new HomeController();
        $controller->getProductsHome();
        break;
   /*  case 'phone':

        if (isset($params[1]) && !empty($params[1])) {
            $controller = new CategoryController();
           
            $controller->getProductFilter($params[1]); 
        } else {
            $controller = new CategoryController();
            
            $controller->getProductFilter(); 
        }
        break; */

    default:
        echo ('404 Page not found');
        break;
}
