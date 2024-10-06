<?php


class ProductModel
{



    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }



    function getProducts()
    {

        $db = $this->getConection();

        $query = $db->prepare("SELECT * FROM product");

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;

    }
    function getProductFilter($brand, $max_price, $min_price)
    {
        $db = $this->getConection();
        $query = $db->prepare("
        SELECT * FROM product 
        WHERE (brand = ? OR ? = '') 
        AND (price >= ? OR ? IS NULL) 
        AND (price <= ? OR ? IS NULL)
    ");
        $query->execute([$brand, $brand, $min_price, $min_price, $max_price, $max_price]);

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }

}