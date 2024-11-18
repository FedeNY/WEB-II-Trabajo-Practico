<?php

require_once 'app/model/db_connect.php';
class ProductModel extends ConectDB
{

    // Solicitudes "C.R.U.D" orientada a los productos


    // Crea un producto en la DB
    function addProduct($product)
    {
        $query = $this->db->prepare('INSERT INTO `product` 
        (`id`, `img`, `name`, `description`, `camera`, `system`, `screen`, `id_brand`, `gamma`, `price`, `offer`, `offer_price`, `stock`, `quota`) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute($product);
        $id = $this->db->lastInsertId();
        return $id;
    
    }   

    // Obtiene todos los productos de la DB
    function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM product');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }

    // Obtiene productos filtrados a partir de su Marca.
    function getProductFilter($brand)
    {
        $query = $this->db->prepare('SELECT * FROM product WHERE id_brand = ?');
        $query->execute([$brand]);
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }

    // Obtiene un producto identificandolo por su "ID" para poder editarlo.
    function getProductId($id)
    {
        $query = $this->db->prepare('SELECT * FROM product WHERE id = ?');
        $query->execute([$id]);
        $arr = $query->fetch(PDO::FETCH_OBJ);
        return $arr;
    }

    // Obtiene 5 productos de la DB que esten "disponibles" y en "oferta".
    function getNewsHome()
    {
        $query = $this->db->prepare('SELECT * FROM product WHERE offer != 0 AND stock = 1  ORDER BY id DESC LIMIT 5 ');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }

    // Obtiene 11 productos "disponibles".
    function getProductHome()
    {
        $query = $this->db->prepare('SELECT * FROM product WHERE stock = 1  LIMIT 11');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }

    // Actualiza el producto especificado en la DB.
    function updateProduct($product)
    {
        $query = $this->db->prepare('UPDATE `product` SET `img` = ? ,`name` = ? ,`description` = ? ,`camera` = ? ,`system` = ? ,`screen` = ? , `id_brand` = ? ,`gamma` = ? ,`price` = ?, `offer` = ? ,`offer_price` = ? ,`stock` = ? ,`quota`= ? WHERE `id` = ?');
        $query->execute($product);
        $status = $query->rowCount();
        return $status;
    }

    // Elimina un producto en especifico usando como referencia su "ID".
    function deleteProduct($id)
    {
        $query = $this->db->prepare('DELETE FROM product WHERE id = ?');
        $query->execute([$id]);
        $status = $query->rowCount();
        return $status;
    }
}
