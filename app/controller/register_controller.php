<?php

include_once 'app/model/register_model.php';
include_once 'app/view/register_view.php';

class RegisterController
{

    private $model;
    private $view;

    private $navCon;

    function __construct()
    {
        $this->model = new RegisterModel();
        $this->view = new RegisterView();
    }


    function showRegister()
    {
        $this->view->showRegister();
    }


    function register()
    {

        $imgProfile = !empty($_POST['img-profile']) ? htmlspecialchars($_POST['img-profile'], ENT_QUOTES, 'UTF-8') : "https://cdn-icons-png.flaticon.com/512/3736/3736502.png";
        $userName = htmlspecialchars($_POST['user-name'], ENT_QUOTES, 'UTF-8');
        $userEmail = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $passwordConfirm = htmlspecialchars($_POST['confirm-password'], ENT_QUOTES, 'UTF-8');


        if ($password === $passwordConfirm) {

            $password = password_hash($password, PASSWORD_DEFAULT);

            $user = [$imgProfile, $userName, $userEmail, $password];

            $this->model->sendRegister($user);

            header("Location:" . BASE_URL . "/showLogin");
        } else {

            echo "Clave no coincide";
        }
    }
}
