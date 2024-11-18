<?php


require_once 'app/model/product_model.php';
require_once 'app/model/category_model.php';
require_once 'app/view/product_view.php';
require_once 'app/view/error_view.php';

class ProductController
{
    private $model;
    private $view;
    private $error;
    private $modelCategory;

    function __construct()
    {
        $this->model = new ProductModel();
        
        $this->modelCategory = new CategoryModel();

        $this->error = new ErrorView();

        $this->view = new ProductView();

    }
        // Obtiene productos en oferta y 11 ultimos productos para el home
    function getProductsHome()
    {   
        
        $arr = $this->model->getProductHome();
        $arrNews = $this->model->getNewsHome();

        $this->view->showHome($arr, $arrNews);

    }   // Obtiene productos filtrados por marca
    function getProductFilter()
    {

        if (!isset($_POST['brand']) || $_POST['brand'] == "all") {
            $brand = null;
        } else {
            $brand = htmlspecialchars($_POST['brand'], ENT_QUOTES, 'UTF-8');
        }

        if (!$brand) {
            $arr = $this->model->getProducts();
        } else {
            $brandStatus = $this->modelCategory->getBrandId($brand);

            if (!$brandStatus) {
                //return $this->error->showError("Error marca no encontrada");
            }

            $arr = $this->model->getProductFilter($brandStatus->id_category);
        }

        $brandCategory = $this->modelCategory->getAllBrand();

        $this->view->showProduct($arr, $brandCategory);
    }
        // Obtiene un producto por id y dependiendo de quien lo pida es para editar o ver los detalles
     function getProductId($id)
        {
            $arr = $this->model->getProductId($id);
            
            // Verifica si encontro el producto 
    
            if (!$arr)
                return $this->error->showError("Producto no encontrado","home","/",404);
           
                $brand = $this->modelCategory->getBrand($arr->id_brand);
   
                $this->view->showDetailProduct($arr,$brand->brand);
     }
     function getProductAll()
     {
         $arr = $this->model->getProducts();
         $brand = $this->modelCategory->getAllBrand();
         $this->view->showProductView($arr, $brand);
     }
        // Obtiene las marcas para crear un product
     function showAddProduct()
    {
        $brand = $this->modelCategory->getAllBrand();

        if(!$brand)
            return $this->error->showError("Error no se han encontrado marcas","product","/product", 404);

        $this->view->showPageAdd($brand);
    }
        // Crea un Producto
     function createProduct()
    {
        $img = htmlspecialchars($_POST['img-url'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $brand = htmlspecialchars($_POST['brand'], ENT_QUOTES, 'UTF-8');
        $gamma = htmlspecialchars($_POST['gamma'], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');
        $offer = htmlspecialchars($_POST['offer'], ENT_QUOTES, 'UTF-8');
        $camera = htmlspecialchars($_POST['camera'], ENT_QUOTES, 'UTF-8');
        $system = htmlspecialchars($_POST['system'], ENT_QUOTES, 'UTF-8');
        $screen = htmlspecialchars($_POST['screen'], ENT_QUOTES, 'UTF-8');
        $offerPrice = ($offer * $price) / 100;
        $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES, 'UTF-8');
        $quota = htmlspecialchars($_POST['quota'], ENT_QUOTES, 'UTF-8');


        $product = [$img, $name, $description, $camera, $system, $screen, $brand, $gamma, $price, $offer, $offerPrice, $stock, $quota];

        $status = $this->model->addProduct($product);

        if(!$status)
            return $this->error->showError("Error no se ha podido crear el producto","product","/product",404);

        header("Location:" . BASE_URL . "/product");
    }
        //Obtiene un producto por id para editar
    function showEditProduct($id)
    {
        $product = $this->model->getProductId($id);
        $arrBrand = $this->modelCategory->getAllBrand();
        
        if(!$product)
            return $this->error->showError("Producto no encontrado","product","/product",404);

        $status = false;

        foreach ($arrBrand as $element) {

             if ($element->id_category == $product->id_brand) {
                $product->brand = $element->brand;
                $status = true;
    }
        }

        if(!$status)
                return $this->error->showError("Error marca no existe","product","/product",404);


        $this->view->showEditView($product, $arrBrand);
    }
        // Edita el producto
    function updateProduct($id)
    {
        $img = htmlspecialchars($_POST['img-url'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $brand = htmlspecialchars($_POST['brand-select'], ENT_QUOTES, 'UTF-8');
        $gamma = htmlspecialchars($_POST['gamma'], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');
        $camera = htmlspecialchars($_POST['camera'], ENT_QUOTES, 'UTF-8');
        $system = htmlspecialchars($_POST['system'], ENT_QUOTES, 'UTF-8');
        $screen = htmlspecialchars($_POST['screen'], ENT_QUOTES, 'UTF-8');
        $offer = htmlspecialchars($_POST['offer'], ENT_QUOTES, 'UTF-8');
        $offerPrice = $price - (($offer * $price) / 100);
        $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES, 'UTF-8');
        $quota = htmlspecialchars($_POST['quota'], ENT_QUOTES, 'UTF-8');

        $product = [$img, $name, $description, $camera, $system, $screen, $brand, $gamma, $price, $offer, $offerPrice, $stock, $quota, $id];

        $status = $this->model->updateProduct($product);

        if(!$status)
            return $this->error->showError("Error no se ha podido actualizar el producto o no se cambio ningun valor","/product",500);

        header("Location:" . BASE_URL . "/product");
    }
        // Borra un producto por id
    function deleteProduct($id)
    {
        $this->model->deleteProduct($id);

        $arr = $this->model->getProductId($id);

        if($arr)
            $this->error->showError("No ha podido borrar el producto",500);

        header('Location:' . BASE_URL . '/product');
    }  
}
