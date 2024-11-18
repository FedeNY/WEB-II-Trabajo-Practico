<?php

function sessionAuthMiddleware($res)
{
    session_start();

    var_dump($_SESSION);

    if(isset($_SESSION['id'])){
        $res->user = new stdClass();
        $res->user->id = $_SESSION['Id'];
        $res->user->img = $_SESSION['Img'];
        $res->user->name = $_SESSION['User'];
        $res->user->email = $_SESSION['Email'];
        return;
    }

    else {
        header('Location: ' . BASE_URL . '/showLogin');
        exit();
    }
}
