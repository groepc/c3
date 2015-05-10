<?php

namespace models;

use core\Model;

class Role extends Model
{
    const ROLE_ADMINISTRATION = 3;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 1;

    private $id;
    private $name;

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data)
    {
        $this->id = $data->ID;
        $this->name = $data->naam;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
