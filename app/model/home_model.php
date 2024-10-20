<?php
require_once 'app/model/db_connect.php';

class HomeModel extends ConectDB
{

    function getNewsHome()
    {

        $query = $this->db->prepare('SELECT * FROM product WHERE offer != 0 AND stock = 1  ORDER BY id DESC LIMIT 5 ');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    
    
    }

    function getProductHome()
    {

        $query = $this->db->prepare('SELECT * FROM product WHERE stock = 1  LIMIT 11');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;

    }

}