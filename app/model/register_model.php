<?php

class RegisterModel
{
    private function getConection()
    {
        return new PDO('mysql:host=localhost;dbname=g160_db_prueba_tienda;charset=utf8', 'root', '');
    }


    function sendRegister($user)
    {
        $db = $this->getConection();
        $query = $db->prepare('INSERT INTO `user` (`id`,`img_profile`,`name`,`email`,`password`) VALUEs (NULL,?,?,?,?)');
        $query->execute($user);
    }
}
