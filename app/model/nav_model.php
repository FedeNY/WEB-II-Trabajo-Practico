<?php







class NavCategoryModel
{


    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }



    function getCategory()
    {



        $db = $this->getConection();

        $query = $db->prepare('SELECT DISTINCT brand FROM product;');

        $query-> execute();


        $arr = $query->fetchAll(PDO::FETCH_OBJ);


        return $arr;


    }






}



