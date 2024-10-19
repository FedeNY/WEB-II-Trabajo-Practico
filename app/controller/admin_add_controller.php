<?php

require 'app/view/admin_add_view.php';
require 'app/model/admin_add_model.php';


class AdminAddController
{

    private $model;

    private $view;

    function __construct()
    {

        $this->model = new AdminAddModel;

        $this->view = new AdminAddView;
    }

    function sendProduct()
    {
        $img = htmlspecialchars($_POST['img-url'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $brand = htmlspecialchars($_POST['brand'], ENT_QUOTES, 'UTF-8');
        $gamma = htmlspecialchars($_POST['gamma'], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');
        $offer = htmlspecialchars($_POST['offer'], ENT_QUOTES, 'UTF-8');
        $camera = htmlspecialchars($_POST['camera'], ENT_QUOTES, 'UTF-8');
        $system = htmlspecialchars($_POST['system'], ENT_QUOTES, 'UTF-8');
        $screen = htmlspecialchars($_POST['screen'], ENT_QUOTES, 'UTF-8');
        $offerPrice = ($offer * $price) / 100;
        $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES, 'UTF-8');
        $quota = htmlspecialchars($_POST['quota'], ENT_QUOTES, 'UTF-8');


        $product = [$img, $name, $description, $camera, $system, $screen, $brand, $gamma, $price, $offer, $offerPrice, $stock, $quota];

        $this->model->addProduct($product);

        header("Location:" . BASE_URL . "/admin");
    }

    function showToolAdd()
    {
        $arrBrand = $this->model->getCategory();
        $this->view->showPageAdd($arrBrand, true);
    }
}
