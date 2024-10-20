<?php

require_once 'app/model/db_connect.php';
class UserModel extends ConectDB
{

    function getUserByEmail($user)
    {

        $query = $this->db->prepare('SELECT * FROM user WHERE `name`= ?');

        $query->execute([$user]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }


}
