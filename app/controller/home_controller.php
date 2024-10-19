<?php
include 'app/model/home_model.php';
include 'app/view/home_view.php';
class HomeController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new HomeModel();

        $this->view = new HomeView();


    }

    function getProductsHome()
    {

        $arr = $this->model->getProductHome();
        $arrNews = $this->model->getNewsHome();




        $this->view->showHome($arr, $arrNews);

    }


}