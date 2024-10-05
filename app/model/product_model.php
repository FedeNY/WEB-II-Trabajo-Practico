<?php


class ProductModel {



    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db__tienda_celulares;charset=utf8', 'root', '');
    }



    function getProduct()
    {

        $db = $this->getConection();

        $query = $db->prepare("SELECT * FROM producto");

        $query-> execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;

    }

}