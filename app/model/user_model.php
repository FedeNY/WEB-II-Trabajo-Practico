<?php

require_once 'app/model/db_connect.php';

class UserModel extends ConectDB
{

    // Administra las solicitudes de creacion de usuario y la verificacion de que exista en caso de login

    // Obtiene un usuario identificado por su nombre.
    function getUserByName($user)
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE name = ?');
        $query->execute([$user]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    // Registra un usuario en la DB.
    function sendRegister($user)
    {
        $query = $this->db->prepare('INSERT INTO `user` (`id`,`img_profile`,`name`,`email`,`password`) VALUEs (NULL,?,?,?,?)');
        $query->execute($user);
        $id = $this->db->lastInsertId();
        return $id;
    }
}
