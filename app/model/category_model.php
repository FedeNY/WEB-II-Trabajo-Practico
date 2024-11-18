<?php

require_once 'app/model/db_connect.php';

class CategoryModel extends ConectDB
{

    // Solicitudes C.R.U.D orientadas a las categorias
        
    
        

    // Crea una nueva categoria en la DB
    function sendCategory($brand){
        $query = $this->db->prepare('INSERT INTO `category` (`brand`) VALUES (?)');
        $query->execute([$brand]);
    }

    // Borra la categoria seleccionada
    function deleteCategory($brand)
    {
        $query = $this->db->prepare('DELETE FROM category WHERE `category`.`brand`= ?');
        $query->execute([$brand]);
    }

    // Obtiene una categoria de la tabla category 

    function getBrand ($brand){
        $query = $this->db->prepare('SELECT id_category FROM category WHERE brand = ?');
        $query->execute([$brand]);
        $brand = $query->fetch(PDO::FETCH_OBJ);
        return $brand;

    }

    function getAllBrand(){
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr; 
    }


/*     function getCategory($brand)
    {
        $query = $this->db->prepare('SELECT brand FROM category WHERE brand = ?');
        $query->execute([$brand]);
        $arr = $query->fetch(PDO::FETCH_OBJ);
        return $arr;
    } */

    // Obtiene las categorias EXISTENTES de los productos
    function getCategoryProduct()
    {
        $query = $this->db->prepare('SELECT DISTINCT brand FROM category');
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $arr;
    }
}
