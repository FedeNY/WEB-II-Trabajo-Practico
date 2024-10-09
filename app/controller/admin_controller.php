<?php

require 'app/model/admin_model.php';
require 'app/view/admin_view.php';



class AdminController {



private $model;
private $view;



function __construct() {

    $this->model = new AdminModel;
    $this->view = new AdminView;

}



function showAdminProduct() {


    $arr=$this->model->getProducts();


    $this->view->showAdminView($arr);


}




}