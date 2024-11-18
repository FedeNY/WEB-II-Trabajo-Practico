<?php

class UserView
{

    function showLogin()
    {
        require_once 'template/login.phtml';
    }

    function showRegister()
    {

        require_once 'template/register.phtml';
    }
}
