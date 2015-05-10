<?php

namespace models;

use core\Model;

class Subscription extends Model
{
    private $planningId;
    private $userId;
    private $dateTime;
    private $grade;
    private $reviewed;
    private $present;
    private $planning;
    private $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data)
    {
        $this->planningId = $data->planningID;
        $this->userId = $data->gebruikerID;
        $this->dateTime = $data->datumtijd;
        $this->grade = $data->cijfer;
        $this->reviewed = $data->beoordeling;
        $this->present = $data->aanwezig;
    }

    /**
     * @return mixed
     */
    public function getPlanningId()
    {
        return $this->planningId;
    }

    /**
     * @param $planningId
     *
     * @return $this
     */
    public function setPlanningId($planningId)
    {
        $this->planningId = $planningId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param $dateTime
     *
     * @return $this
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param $grade
     *
     * @return $this
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReviewed()
    {
        return $this->reviewed;
    }

    /**
     * @param $reviewed
     *
     * @return $this
     */
    public function setReviewed($reviewed)
    {
        $this->reviewed = $reviewed;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPresent()
    {
        return $this->present;
    }

    /**
     * @param $present
     *
     * @return $this
     */
    public function setPresent($present)
    {
        $this->present = $present;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanning()
    {
        return $this->planning;
    }

    /**
     * @param $planning
     *
     * @return $this
     */
    public function setPlanning($planning)
    {
        $this->planning = $planning;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
