<?php
include 'app/model/product_model.php';
include 'app/view/product_view.php';

class ProductController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }


    function getProductFilter()
    {
        $brand = $_POST['brand'] ?? null;
        $minPrice = $_POST['min_price'] ?? null;
        $maxPrice = $_POST['max_price'] ?? null;

        $minPrice = floatval($minPrice) ;
        $maxPrice = floatval($maxPrice) ;

        if ($brand == null && $minPrice == null && $maxPrice == null) {
            $arr = $this->model->getProducts();
        } else {
            // Llama al método de filtrado con los parámetros obtenidos
            $arr = $this->model->getProductFilter($brand, $maxPrice, $minPrice);
        }

        $this->view->showProduct($arr, $brand, $minPrice, $maxPrice);
    }
}
