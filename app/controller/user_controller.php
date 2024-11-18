<?php

require_once 'app/model/user_model.php';
require_once 'app/view/user_view.php';
require_once 'app/view/error_view.php';



class UserController
{

    private $model;
    private $view;

    private $error;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->error = new ErrorView();
    }
    // Zona de login de Usuario
    function showlogin()
    {   
        $this->view->showLogin();
    }
    function login()
    {

        $user = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    
        // Verifica que el usuario exista
        $userFromDB = $this->model->getUserByName($user);
    
        if (!$userFromDB) {
           return $this->error->showError("El usuario no existe", "login", "/showLogin", 404);
        }

        // Verifica que la contraseña coincida
        if (password_verify($password, $userFromDB->password)) {
            $_SESSION['Id'] = $userFromDB->id;
            $_SESSION['Img'] = $userFromDB->img_profile;
            $_SESSION['User'] = $userFromDB->name;
            $_SESSION['Email'] = $userFromDB->email;
    
            // Redirige al home después de hacer login
            header('Location: ' . BASE_URL . "/");
            exit();  
        } else {
           return $this->error->showError("Error: contraseña invalida", "login", "/showLogin", 400);
            
        }
    }
    // Zona Registro
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

        // Verifica que no exista un usuario con el mismo nombre

        $userStatus = $this->model->getUserByName($userName);

        if (!$userStatus) {
           return  $this->error->showError("Nombre de usuario ya ha sido ocupado","register","/showRegister",400);
        }

        // Verifica que la clave de confirmacion coincida

        if ($password === $passwordConfirm) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user = [$imgProfile, $userName, $userEmail, $password];
            
            $status= $this->model->sendRegister($user);

            if(!$status)
                return $this->error->showError("Error no se ha podido crear el usuario","register", "showRegister",500);


            header("Location:" . BASE_URL . "/");
        } else {
            return  $this->error->showError("Contraseña no coincide","register","/showRegister",500);
        }
    }
    // Deslogearse (Destruir la sesion)
    function logOut()
    {
        session_start();
        session_destroy();
        header('location:' . BASE_URL);
    }
}
