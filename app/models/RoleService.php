<?php

namespace models;

use core\Model;

class RoleService extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRoleById($id)
    {
        $data = $this->_db->select('SELECT * FROM rol WHERE id = :id', array(':id' => $id));

        $role = new Role();
        $role->setData($data[0]);

        return $role;
    }
}
