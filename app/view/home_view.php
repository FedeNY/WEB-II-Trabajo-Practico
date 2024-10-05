<?php


class ProductView
{


    function __construct()
    {
    }

    function showHome($product)
    {           
           $this->formHome();


            require 'template/home.phtml';
       

    }

    function formHome(){
    
    
    
    
    }
}


/* 
include 'template/header.php';


echo "<ul>";

foreach ($product as $e) {

    echo "<li> $e->modelo </li>";
}

echo "</ul>";

include 'template/footer.php'; */