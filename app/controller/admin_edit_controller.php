<?php

include 'app/model/admin_edit_model.php';
include 'app/view/admin_edit_view.php';



class AdminEditController
{
    private $model;
    private $view;

    function __construct()
    {

        $this->model = new AdminEditModel();
        $this->view = new AdminEditView();
    }

    function showEditProduct($id)
    {


        $arr = $this->model->getProductId($id);

        $brands = $this->model->getCategory();

        $this->view->showEditView($arr, $brands, true);
    }


    function updateAdminProduct($id)
    {
        $img = htmlspecialchars($_POST['img-url'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $brand = htmlspecialchars($_POST['brand-select'], ENT_QUOTES, 'UTF-8');
        $gamma = htmlspecialchars($_POST['gamma'], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');
        $camera = htmlspecialchars($_POST['camera'], ENT_QUOTES, 'UTF-8');
        $system = htmlspecialchars($_POST['system'], ENT_QUOTES, 'UTF-8');
        $screen = htmlspecialchars($_POST['screen'], ENT_QUOTES, 'UTF-8');
        $offer = htmlspecialchars($_POST['offer'], ENT_QUOTES, 'UTF-8');
        $offerPrice = $price - (($offer * $price) / 100); 
        $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES, 'UTF-8');
        $quota = htmlspecialchars($_POST['quota'], ENT_QUOTES, 'UTF-8');
        

        $product = [$img, $name, $description, $camera, $system, $screen, $brand, $gamma, $price, $offer, $offerPrice, $stock, $quota, $id];

        $this->model->updateProduct($product);

        header("Location:" . BASE_URL . "/admin");
    }



    function deleteAdminProduct($id)
    {


        $this->model->deleteProduct($id);


        header('Location:' . BASE_URL . '/admin');
    }
}
