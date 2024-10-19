<?php







class AdminModel
{



    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }

    function getCategory()
    {
        $db = $this->getConection();

        $query = $db->prepare('SELECT DISTINCT brand  FROM category;');

        $query->execute();


        $arr = $query->fetchAll(PDO::FETCH_OBJ);


        return $arr;
    }

    function getProducts()
    {
        $db = $this->getConection();

        $query = $db->prepare('SELECT * FROM product');

        $query->execute();

        $arr = $query->fetchAll(PDO::FETCH_OBJ);

        return $arr;
    }


    function sendCategory($brand)
    {
        $db = $this->getConection();

        $query = $db->prepare('INSERT INTO `category` (`brand`) VALUES (?)');

        $query->execute([$brand]);
    }


    function deleteCategory($brand)
    {
        $db = $this->getConection();

        $query = $db->prepare('DELETE FROM category WHERE `category`.`brand`= ?');

        $query->execute([$brand]);
    }
}
