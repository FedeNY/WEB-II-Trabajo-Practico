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

        $query = $db->prepare('SELECT * FROM product WHERE offer != 0 AND stock = 1  ORDER BY id DESC LIMIT 5 ');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    
    
    }

    function getProductHome()
    {

        $db = $this->getConection();

        $query = $db->prepare('SELECT * FROM product WHERE stock = 1  LIMIT 10');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;

    }

}