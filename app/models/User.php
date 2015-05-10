<?php

namespace models;

use core\Model;

class User extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $middlename;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var string
     */
    private $gender;
    /**
     * @var int
     */
    private $roleId;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->id = $data->ID;
        $this->username = $data->gebruikersnaam;
        $this->password = $data->wachtwoord;
        $this->firstname = $data->voornaam;
        $this->middlename = $data->tussenvoegsel;
        $this->lastname = $data->achternaam;
        $this->gender = $data->geslacht;
        $this->roleId = $data->rolID;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * @param string $middlename
     *
     * @return $this
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     *
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId($id)
    {
        $this->roleId = $id;

        return $this;
    }

    public function getFullname()
    {
        return $this->firstname.' '.$this->middlename.' '.$this->lastname;
    }
}
