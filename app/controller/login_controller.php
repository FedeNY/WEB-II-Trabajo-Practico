<?php

include_once 'app/model/login_model.php';
include_once 'app/view/login_view.php';

class UserController
{

    private $model;
    private $view;

    private $navCon;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->navCon = new NavCategoryController();
    }


    function showlogin()
    {
        $this->view->showLogin();
    }

    function logOut()
    {

        session_start();
        session_destroy();

        header('location:' . BASE_URL);
    }

    function login()
    {
        $user = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');


        $userFromDB = $this->model->getUserByEmail($user);

        if (password_verify($password, $userFromDB->password)) {

            session_start();
            $_SESSION['Id'] = $userFromDB->id;
            $_SESSION['Img'] = $userFromDB->img_profile;
            $_SESSION['User'] = $userFromDB->name;
            $_SESSION['Rol'] = $userFromDB->rol;
            $_SESSION['Email'] = $userFromDB->email;

            $user = new stdClass();
            $user->name = $_SESSION['User'];

            header('Location:' . BASE_URL);
        } else {
            header('Location:' . BASE_URL . '/showLogin');
        }
    }
}
