<?php



class CategoryView
{






    function showProduct($product, $brand)
    {


        require 'template/category.phtml';

        var_dump($product);
    }

}