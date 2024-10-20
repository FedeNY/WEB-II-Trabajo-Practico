<?php

require_once 'app/model/db_connect.php';

class NavCategoryModel extends ConectDB
{

    function getCategory()
    {
        $query = $this->db->prepare('SELECT DISTINCT brand FROM category');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }
}
