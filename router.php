<?php

require_once 'app/controller/category_controller.php';
require_once 'app/controller/product_controller.php';
require_once 'app/controller/user_controller.php';
require_once 'libs/response.php';
require_once 'app/middlewares/session_auth_middleware.php';
require_once 'app/middlewares/verify_auth_middleware.php';



define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));
$res = new Response();
$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);


// Tabla de rutas

//las rutas estan ordenadas del mismo orden que en el switch usenlo de referencia

/* Ruta----------------------Controlador----------------------Metodo----------------------Descripcion------------------------------------------------------------

  /home                      product_controller               getProductsHome             Obtiene 5 productos en oferta y 11 de los ultimos productos con stock 

  /category                  category_controller              getProductFilter            Filtra productos por Marca sino tiene un parametro trae todos     

  /detail/:id                product_controller               getProductId                Obtiene un producto seleccionado y lo muestra en la pagina 
  
  /product                   product_controller               getProductAll               Obtiene todos los productos
  
  /productAdd                product_controller               createProduct               Crea un productos con los  datos proporcionados                   

  /productEdit/:id           product_controller               getProductIdEdit            Obtiene un producto seleccionado para poder editarlo                

  /update                    product_controller               updateProduct               Actualiza el producto con la informacion nueva del form            

  /delete                    product_controller               deleteProduct               Borra el producto seleccionado (se encuentra en la pagina edit)       
           
  /addBrand                  category_controller              createBrand                 Crea una nueva marca (solo si no existe en la db)                     

  /deleteBrand               category_controller              deleteBrand                 Elimina una marca (solo si no tiene un producto asociado)             
                                                                                                                                                                                                                                             
  /showLogin                 user_controller                  showlogin                   Pagina donde puede iniciar sesion el usuario                          

  /login                     user_controller                  login                       Recibe los datos del form y verifica si coinciden con la db

  /logout                    user_controller                  logout                      Termina la sesion del usuario destruyendola

  /logout                    user_controller                  logout                      Termina la sesion del usuario destruyendola

  /showRegister              user_controller                  showRegister                Pagina donde se pueden completar datos para crear un usuario

  /register                  user_controller                  register                    obtiene los datos del form y verifica que sean validos


  */


//Administrador de rutas


switch ($params[0]) {

    case 'home':
        $controller = new ProductController();
        $controller->getProductsHome();
        break;

    case 'category':
        $controller = new ProductController();
        $controller->getProductFilter();
        break;

    case 'detail':
        $controller = new ProductController();
        $controller->getProductId($params[1]);
        break;

    case 'buy':
        $controller = new ProductController();
        $controller->getProductsHome();
        break;

    case 'product':
        if (isset($params[1]) && !empty($params[1])) {
            $controller = new CategoryController();
            $controller->showToolAdd();
        } else {
            $controller = new ProductController();
            $controller->getProductAll();
        };
        break;

    case 'productAdd':
        $controller = new ProductController();
        $controller->showAddProduct();
        break;

    case 'productEdit':
        $controller = new ProductController();
        $controller->showEditProduct($params[1]);
        break;

    case 'add':
        $controller = new ProductController();
        $controller->createProduct();
        break;

    case 'edit':
        $controller = new ProductController();
        $controller->getProductId($params[1]);
        break;

    case 'update':
        $controller = new ProductController();
        $controller->updateProduct($params[1]);;
        break;

    case 'delete':
        $controller = new ProductController();
        $controller->deleteProduct($params[1]);;
        break;

    case 'addBrand':
        $controller = new CategoryController();    
        $controller->createBrand();
        break;

    case 'deleteBrand':
        $controller = new CategoryController();
        $controller->deleteBrand();
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
        $controller = new UserController;
        $controller->showRegister();
        break;

    case 'register':
        $controller = new UserController;
        $controller->register();
        break;

    default:
        echo ('404 Page not found');
        break;
}
