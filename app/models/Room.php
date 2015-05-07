<?php
namespace models;

use core\Model;

class Room extends Model
{
    private $code;
    private $seats;
    private $computerRoom;

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data)
    {
        $this->code = $data->code;
        $this->seats = $data->aantalPlaatsen;
        $this->computerRoom = $data->computerlokaal;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param $seats
     * @return $this
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComputerRoom()
    {
        return $this->computerRoom;
    }

    /**
     * @param $computerRoom
     * @return $this
     */
    public function setComputerRoom($computerRoom)
    {
        $this->computerRoom = $computerRoom;

        return $this;
    }
}