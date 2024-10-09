<?php







class DetailModel
{


    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }




    function getProductId($id)
    {

        $db = $this->getConection();

        $query = $db->prepare('SELECT * FROM product WHERE id=?');

        $query->execute([$id]);

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;



    }

}