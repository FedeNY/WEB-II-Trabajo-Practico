<?php

require_once 'app/model/db_connect.php';

class CategoryModel extends ConectDB {



    function getProducts()
    {

        $query =$this->db->prepare("SELECT * FROM product");

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }
    function getProductFilter($brand)
    {
        $query = $this->db->prepare("
        SELECT * FROM product
        WHERE (brand = ? OR ? = '') 
    ");
        $query->execute([$brand, $brand]);

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }

    function getCategory()
    {

        $query = $this->db->prepare('SELECT DISTINCT brand FROM category');

        $query->execute();


        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }


}

