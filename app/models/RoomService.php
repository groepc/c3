<?php

namespace models;

use core\Model;

class RoomService extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchRoomByCode($code)
    {
    }

    public function fetchRooms($offset = 0, $amount = 100)
    {
        $data = $this->_db->select('SELECT * FROM lokaal LIMIT :offset, :amount', array(':offset' => $offset, ':amount' => $amount));

        $roomArray = array();
        foreach ($data as $roomData) {
            $room = new Room();
            $room->setData($roomData);

            $roomArray[] = $room;
        }

        return $roomArray;
    }
}
