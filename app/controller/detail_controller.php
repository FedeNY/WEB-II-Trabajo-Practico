<?php

include 'app/model/detail_model.php';
include 'app/view/detail_view.php';



class DetailController {


    private $model;
    private $view;




    function __construct() {


        $this->model=new DetailModel();
        $this->view=new DetailView();


    }




   function getDetailProduct($id){


    $arr = $this->model->getProductId($id);

    $this->view->showDetailProduct($arr);

}











}