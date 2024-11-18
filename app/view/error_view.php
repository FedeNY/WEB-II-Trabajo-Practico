<?php

class ErrorView
{

    function showError($error,$backTo="home",$backToUrl="/",$status=404)
    {
        require_once 'template/error.phtml';
    }
}
