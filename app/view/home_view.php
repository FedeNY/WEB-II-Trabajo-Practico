<?php


class HomeView
{


    function __construct()
    {
    }

    function showHome($product, $new)
    {

        $productLenght = count($product);


        $newLenght = count($new);

        require 'template/home.phtml';


    }


}
