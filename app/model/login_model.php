<?php

class UserModel
{
    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }


    function getUserByEmail($email)
    {

        $db = $this->getConection();

        $query = $db->prepare('SELECT * FROM user WHERE email = ?');

        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }


}
