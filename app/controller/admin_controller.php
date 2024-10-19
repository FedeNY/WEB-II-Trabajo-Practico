<?php

require 'app/model/admin_model.php';
require 'app/view/admin_view.php';

class AdminController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new AdminModel;
        $this->view = new AdminView;
    }

    function showAdminProduct()
    {
        $arr = $this->model->getProducts();
        $brand = $this->model->getCategory();
        $this->view->showAdminView($arr, $brand);
    }

    function createBrand()
    {
        $newBrand = htmlspecialchars($_POST['new-brand'], ENT_QUOTES, 'UTF-8');

        if (isset($newBrand)) {
            $newBrand = strtolower($newBrand);
            $this->model->sendCategory($newBrand);
        }

        header("Location:" . BASE_URL . "/admin");
    }
    function deleteBrand()
    {

        $brand = htmlspecialchars($_POST['delete-brand'], ENT_QUOTES, 'UTF-8');

        if ($brand !== 'invalido') {

            $this->model->deleteCategory($brand);
        }

        header("Location:" . BASE_URL . "/admin");
    }
}
