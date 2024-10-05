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

    function getProducts()
    {

        $arr = $this->model->getProduct();

        $this->view->showProduct($arr);

    }

}