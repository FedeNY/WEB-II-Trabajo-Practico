<?php

include 'app/model/admin_detail_model.php';
include 'app/view/admin_detail_view.php';



class AdminDetailController
{



    private $model;
    private $view;



    function __construct()
    {

        $this->model = new AdminDetailModel();
        $this->view = new AdminEditView();

    }





    function showEditProduct($id)
    {


        $arr = $this->model->getProductId($id);

        $brands = $this->model->getCategory();

        $this->view->showEditView($arr, $brands);


    }

    function deleteAdminProduct($id)
    {


        $this->model->deleteProduct($id);


        header('Location:' . BASE_URL . '/admin');


    }

}