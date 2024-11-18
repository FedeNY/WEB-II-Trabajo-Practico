<?php

class UserView
{

    function showLogin($error = null)
    {
        require_once 'template/login.phtml';
    }

    function showRegister()
    {

        require_once 'template/register.phtml';
    }
}
