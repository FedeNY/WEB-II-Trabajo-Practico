<?php

require_once 'app/model/db_connect.php';

class RegisterModel extends ConectDB
{

    function sendRegister($user)
    {

        $query = $this->db->prepare('INSERT INTO `user` (`id`,`img_profile`,`name`,`email`,`password`) VALUEs (NULL,?,?,?,?)');
        $query->execute($user);
    }
}
