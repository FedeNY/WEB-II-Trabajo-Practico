<?php


class ProductView
{
    function showHome($product, $offer)
    {   
        require_once 'template/home.phtml';
    }

    function showProductView($product, $brand)
    {
        require_once 'template/product.phtml';
    }

    function showDetailProduct($element,$brand)
    {      


        require_once 'template/detail.phtml';
    }
    function showProduct($product,$category)
    {
        require_once 'template/category.phtml';
    }
    function showEditView($element, $brandArr)
    {
        require_once 'template/product_edit.phtml';
    }

    function showPageAdd($arrBrand)
    {
        require_once 'template/product_add.phtml';
    }
}
