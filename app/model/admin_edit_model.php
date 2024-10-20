<?php

require_once 'app/model/db_connect.php';


class AdminEditModel extends ConectDB
{
    function getProductId($id)
    {

        $query = $this->db->prepare('SELECT * FROM product WHERE id = ?');
        $query->execute([$id]);
        $arr[0] = $query->fetch(PDO::FETCH_OBJ);
        return $arr;
    }


    function deleteProduct($id)
    {

        $query = $this->db->prepare('DELETE FROM product WHERE id = ?');
        $query->execute([$id]);
    }

    function updateProduct($product)
    {
        $query = $this->db->prepare('UPDATE `product` SET `img` = ? ,`name` = ? ,`description` = ? ,`camera` = ? ,`system` = ? ,`screen` = ? , `brand` = ? ,`gamma` = ? ,`price` = ?, `offer` = ? ,`offer_price` = ? ,`stock` = ? ,`quota`= ? WHERE `id` = ?');
        $query->execute($product);
    }

    function getCategory()
    {
        $query = $this->db->prepare('SELECT DISTINCT brand FROM category');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }
}
