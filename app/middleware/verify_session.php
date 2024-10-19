<?php



function sessionAuthMiddleware($res, $state)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if($state == true) {
    // si state es true no hace nada para que la sesion se inicie pero no se logee el usuario
    }

   else if (isset($_SESSION['Id'])) {
        $res->user = new stdClass();
        $res->user->id = $_SESSION['Id'];
        $res->user->img = $_SESSION['Img'];
        $res->user->name = $_SESSION['User'];
        $res->user->rol = $_SESSION['Rol'];
        $res->user->email = $_SESSION['Email'];
    } else {
        header('Location: ' . BASE_URL . "/showLogin");
        die();
    }
}
