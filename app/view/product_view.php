<?php



class ProductView {






function showProduct($product,$brand, $minPrice, $maxPrice){


    require 'template/product.phtml';

    var_dump($product);
}






}