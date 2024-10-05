<?php


class ProductView
{


    function __construct()
    {
    }

    function showProduct($product)
    {

        include 'template/header.php';


        echo "<ul>";

        foreach ($product as $e) {

            echo "<li> $e->modelo </li>";
        }

        echo "</ul>";

        include 'template/footer.php';

    }

}