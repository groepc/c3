<?php

namespace models;

use core\Model;

class UserService extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserById($id)
    {
        $data = $this->_db->select('SELECT * FROM gebruiker WHERE id = :id', array(':id' => $id));

        $user = new User();
        $user->setData($data[0]);

        return $user;
    }

    public function getUserByUsername($username)
    {
        $data = $this->_db->select('SELECT * FROM gebruiker WHERE gebruikersnaam = :username', array(':username' => $username));

        $user = new User();
        $user->setData($data[0]);

        return $user;
    }
}
