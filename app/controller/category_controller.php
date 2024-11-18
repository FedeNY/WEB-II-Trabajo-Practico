<?php

require_once 'app/model/category_model.php';
require_once 'app/model/product_model.php';
require_once 'app/controller/product_controller.php';

class CategoryController
{
    private $model;
    private $view;

    private $viewProduct;

    private $modelProduct;

    function __construct()
    {
        $this->model = new CategoryModel();
        
        $this->view = new ProductView();

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
    /*     function createBrand()
    {
        $newBrand = htmlspecialchars($_POST['new-brand'], ENT_QUOTES, 'UTF-8');

        if (isset($newBrand)) {
            $newBrand = strtolower($newBrand);

            $brandStatus = $this->model->getCategory($newBrand);

            // verifica si existe ya una marca con ese nombre

            if (count($brandStatus) > 0) {

                echo "Error ya existe una categoria con ese nombre";

                sleep(5);

                header("Location:" . BASE_URL . "/product");

                die();
            }

            $this->model->sendCategory($newBrand);

            echo "Procesando categoria...";

            // verifica si se creo la marca

            $statusBrand = $this->getBrand($newBrand);

            if ($statusBrand !== 1) {

                echo "Error la marca no fue creada.";
            } else {

                echo "La Marca fue creada con exito.";
            }

            sleep(5);

            header("Location:" . BASE_URL . "/product");

            die();
        }
    }
 */
    /*  function getBrand($brand)
    {
        $brandStatus = $this->model->getCategory($brand);
        return $brandStatus;
    }
 */

    // Borrar una Marca (Solo si no tiene productos)
    function deleteBrand()
    {
        $brand = htmlspecialchars($_POST['delete-brand'], ENT_QUOTES, 'UTF-8');

        if ($brand !== 'invalido') {
            $this->model->deleteCategory($brand);
        }

        header("Location:" . BASE_URL . "/product");

        die();
    }


    // Filtro pagina Category
    function getProductFilter()
    {

        if (!isset($_POST['brand']) || $_POST['brand'] == "all") {
            $brand = null;
        } else {
            $brand = htmlspecialchars($_POST['brand'], ENT_QUOTES, 'UTF-8');
        }

        if (!$brand) {
            $arr = $this->modelProduct->getProducts();
        } else {
            $brandStatus = $this->model->getBrand($brand);

            if (!$brandStatus) {
                //return $this->error->showError("Error marca no encontrada");
            }

            $arr = $this->modelProduct->getProductFilter($brandStatus->id_category);
        }

        $brandCategory = $this->model->getAllBrand();

        $this->view->showProduct($arr, $brandCategory);
    }
}
