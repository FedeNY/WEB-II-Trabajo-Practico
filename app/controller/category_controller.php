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


    function getProductFilter($brandNav)
    {

        $brand = isset($_POST['brand']) ? htmlspecialchars($_POST['brand'], ENT_QUOTES, 'UTF-8') : null;

        $brandCategory = $this->model->getCategory();

        if (($brand == null || $brand == 'all') && $brandNav == null) {
            $arr = $this->model->getProducts();
        } else if ($brand == null && $brandNav !== null) {
            $arr = $this->model->getProductFilter($brandNav);
        } else {
            $arr = $this->model->getProductFilter($brand);
        }

        $this->view->showProduct($arr, $brand, $brandCategory);
    }
}
