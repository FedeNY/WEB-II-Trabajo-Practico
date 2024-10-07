<?php
include 'app/model/category_model.php';
include 'app/view/category_view.php';

class CategoryController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }


    function getProductFilter()
    {
        $brand = $_POST['brand'] ?? null;
        

        if ($brand == null) {
            $arr = $this->model->getProducts();
        } else {
            // Llama al método de filtrado con los parámetros obtenidos
            $arr = $this->model->getProductFilter($brand);
        }

        $this->view->showProduct($arr, $brand,);
    }
}
