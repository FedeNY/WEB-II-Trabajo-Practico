<?php


class HomeModel
{



    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }

    function getNewsHome()
    {
    
        $db = $this->getConection();

        $query = $db->prepare("SELECT * FROM product ORDER BY id DESC LIMIT 4;");

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    
    
    }

    function getProductHome()
    {

        $db = $this->getConection();

        $query = $db->prepare("SELECT * FROM product LIMIT 8");

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;

    }

}