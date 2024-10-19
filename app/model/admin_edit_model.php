<?php

class AdminEditModel
{
    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }

    function getProductId($id)
    {
        $db = $this->getConection();
        $query = $db->prepare('SELECT * FROM product WHERE id = ?');
        $query->execute([$id]);
        $arr[0] = $query->fetch(PDO::FETCH_OBJ);
        return $arr;
    }


    function deleteProduct($id)
    {
        $db = $this->getConection();
        $query = $db->prepare('DELETE FROM product WHERE id = ?');
        $query->execute([$id]);
    }

    function updateProduct($product)
    {
        $db = $this->getConection();
        $query = $db->prepare('UPDATE `product` SET `img` = ? ,`name` = ? ,`description` = ? ,`camera` = ? ,`system` = ? ,`screen` = ? , `brand` = ? ,`gamma` = ? ,`price` = ?, `offer` = ? ,`offer_price` = ? ,`stock` = ? ,`quota`= ? WHERE `id` = ?');
        $query->execute($product);
    }

    function getCategory()
    {
        $db = $this->getConection();
        $query = $db->prepare('SELECT DISTINCT brand FROM category');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }
}
