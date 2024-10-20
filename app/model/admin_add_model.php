<?php
require_once 'app/model/db_connect.php';
class AdminAddModel extends ConectDB
{

    function getCategory()
    {

        $query = $this->db->prepare('SELECT DISTINCT brand FROM category');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;

    }

    function addProduct($product)
    {

        $query = $this->db->prepare('INSERT INTO `product` 
        (`id`, `img`, `name`, `description`, `camera`, `system`, `screen`, `brand`, `gamma`, `price`, `offer`, `offer_price`, `stock`, `quota`) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $query->execute($product);
        
    }
}
