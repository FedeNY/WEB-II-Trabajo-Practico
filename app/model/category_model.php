<?php

require_once 'app/model/db_connect.php';

class CategoryModel extends ConectDB
{

    // Crea una nueva categoria en la DB
    function addBrand($brand){
        $query = $this->db->prepare('INSERT INTO `category` (`brand`) VALUES (?)');
        $query->execute([$brand]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    // Borra la categoria seleccionada
    function deleteBrand($brand)
    {
        $query = $this->db->prepare('DELETE FROM category WHERE `category`.`brand`= ?');
        $query->execute([$brand]);
        $status = $query->rowCount();
        return $status;
    } 
    
    // Obtiene una categoria de la tabla category 
    function getBrand ($brand){
        $query = $this->db->prepare('SELECT * FROM category WHERE id_category = ?');
        $query->execute([$brand]);
        $brand = $query->fetch(PDO::FETCH_OBJ);
        return $brand;
    }

    // Obtiene un id categoria de la tabla category 
    function getBrandId ($brand){
        $query = $this->db->prepare('SELECT id_category FROM category WHERE brand = ?');
        $query->execute([$brand]);
        $brand = $query->fetch(PDO::FETCH_OBJ);
        return $brand;
    }

    //Obtiene todas las categorias
    function getAllBrand(){
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr; 
    }

    // Obtiene unicamente las marcas
    function getBrandProduct()
    {
        $query = $this->db->prepare('SELECT DISTINCT brand FROM category');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }
}
