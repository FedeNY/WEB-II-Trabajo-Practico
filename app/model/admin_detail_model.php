<?php







class AdminDetailModel
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

        $arr[0] = $query->fetch(PDO::FETCH_OBJ);

        return $arr;

    }


    function deleteProduct($id)
    {

        $db = $this->getConection();

        $query = $db->prepare('DELETE FROM product WHERE id=?');
        $query->execute([$id]);

    }

    function getCategory()
    {

        $db = $this->getConection();

        $query = $db->prepare('SELECT DISTINCT brand FROM product;');

        $query->execute();

        $arr = $query->fetch(PDO::FETCH_OBJ);


        return $arr;


    }


}
