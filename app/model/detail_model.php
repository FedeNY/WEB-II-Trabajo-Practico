<?php

require_once 'app/model/db_connect.php';





class DetailModel extends ConectDB
{



    function getProductId($id)
    {

        $query = $this->db->prepare('SELECT * FROM product WHERE id = ?');

        $query->execute([$id]);

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;



    }

}