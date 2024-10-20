<?php

include 'app/model/nav_model.php';
include 'app/view/nav_view.php';



class NavCategoryController
{
    private $model;
    private $view;

    private $user = null;
    function __construct()
    {
        $this->model = new NavCategoryModel();
        $this->view = new NavCategoryView();
    }

    function getBrands()
    {
        $brand = $this->model->getCategory();
        $this->view->BrandDisplay($brand);
    }
}
