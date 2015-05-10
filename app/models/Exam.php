<?php

namespace models;

use core\Model;

class Exam extends Model
{
    private $code;
    private $course;
    private $period;
    private $studentAmount;
    private $computerRoom;
    private $supervisor;
    private $userId;
    private $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data)
    {
        $this->code = $data->code;
        $this->course = $data->vak;
        $this->period = $data->periode;
        $this->studentAmount = $data->aantalStudenten;
        $this->computerRoom = $data->computerlokaal;
        $this->supervisor = $data->surveillant;
        $this->userId = $data->gebruikerID;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return mixed
     */
    public function getStudentAmount()
    {
        return $this->studentAmount;
    }

    /**
     * @param mixed $studentAmount
     */
    public function setStudentAmount($studentAmount)
    {
        $this->studentAmount = $studentAmount;
    }

    /**
     * @return mixed
     */
    public function getComputerRoom()
    {
        return $this->computerRoom;
    }

    /**
     * @param mixed $computerRoom
     */
    public function setComputerRoom($computerRoom)
    {
        $this->computerRoom = $computerRoom;
    }

    /**
     * @return mixed
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * @param mixed $supervisor
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}
