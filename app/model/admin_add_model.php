<?php

class AdminAddModel
{

    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }

    function getCategory()
    {
        $db = $this->getConection();

        $query = $db->prepare('SELECT DISTINCT brand FROM category');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }

    function addProduct($product)
    {

        $db = $this->getConection();

        $query = $db->prepare('INSERT INTO `product` 
        (`id`, `img`, `name`, `description`, `camera`, `system`, `screen`, `brand`, `gamma`, `price`, `offer`, `offer_price`, `stock`, `quota`) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $query->execute($product);
    }
}
