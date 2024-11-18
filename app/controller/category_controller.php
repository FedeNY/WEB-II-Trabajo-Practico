<?php

require_once 'app/model/category_model.php';
require_once 'app/model/product_model.php';
require_once 'app/view/error_view.php';
require_once 'app/controller/product_controller.php';

class CategoryController
{
    private $model;
    private $view;

    private $error;

    private $viewProduct;

    private $modelProduct;

    function __construct()
    {
        $this->model = new CategoryModel();

        $this->view = new ProductView();

        $this->error = new ErrorView();

        $this->modelProduct = new ProductModel();
    }


    // Pagina Product 

    // Obtiene las marcas para usarlas en la pagina product
    function showToolAdd()
    {
        $arrBrand = $this->model->getAllBrand();
        $this->view->showProductView($arrBrand, true);
    }

    // Obtener todos los Productos y Categorias
    function showProduct()
    {
        $arr = $this->modelProduct->getProducts();
        $brand = $this->model->getCategoryProduct();
        $this->viewProduct->showProductView($arr, $brand);
    }

    // Crear una Marca
    function createBrand()
    {
        $newBrand = htmlspecialchars($_POST['new-brand'], ENT_QUOTES, 'UTF-8');

        if (!isset($newBrand) || empty($newBrand))
            return $this->error->showError("Marca no escrita", "product", "/product", 400);


        $newBrand = strtolower($newBrand);

        $brandStatus = $this->model->getBrand($newBrand);

        // verifica si existe ya una marca con ese nombre

        if ($brandStatus)
            return $this->error->showError("Error la marca ya existe", "product", "/product", 400);

        $status = $this->model->sendCategory($newBrand);

        if (!$status)
            return $this->error->showError("Error no se ha podido crear la marca", "product", "/product", 500);

        header("Location:" . BASE_URL . "/product");
        die();
    }

    // Borrar una Marca (Solo si no tiene productos)
    function deleteBrand()
    {
        $brand = htmlspecialchars($_POST['delete-brand'], ENT_QUOTES, 'UTF-8');

        $idBrand = $this->model->getBrand($brand);

        if (!$idBrand)
            return $this->error->showError("Error no se ha podido encontrar la marca", "product", "/product", 404);

        $product = $this->modelProduct->getProductFilter($idBrand->id_category);

        if ($product)
            return $this->error->showError("Error esta marca tiene productos asignados", "product", "/product", 400);

        $status = $this->model->deleteCategory($brand);

        if (!$status)
            return $this->error->showError("Error no se ha podido borrar la marca", "product", "/product", 500);

        header("Location:" . BASE_URL . "/product");

        die();
    }
}
