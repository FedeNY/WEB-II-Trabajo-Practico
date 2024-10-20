<?php


require_once 'app/model/db_connect.php';




class AdminModel extends ConectDB
{


    function getCategory()
    {


        $query = $this->db->prepare('SELECT DISTINCT brand  FROM category;');

        $query->execute();


        $arr = $query->fetchAll(PDO::FETCH_OBJ);


        return $arr;
    }

    function getProducts()
    {

        $query = $this->db->prepare('SELECT * FROM product');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }


    function sendCategory($brand)
    {
        $query = $this->db->prepare('INSERT INTO `category` (`brand`) VALUES (?)');

        $query->execute([$brand]);
    }


    function deleteCategory($brand)
    {


        $query = $this->db->prepare('DELETE FROM category WHERE `category`.`brand`= ?');

        $query->execute([$brand]);
    }
}
