<?php

namespace models;

use core\Model;

class Planning extends Model
{
    private $id;
    private $dateTime;
    private $examCode;
    private $userId;
    private $roomCode;
    private $user;
    private $exam;

    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data)
    {
        $this->id = $data->ID;
        $this->dateTime = $data->datumtijd;
        $this->examCode = $data->tentamencode;
        $this->userId = $data->gebruikerID;
        $this->roomCode = $data->lokaalCode;
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
    public function getExamCode()
    {
        return $this->examCode;
    }

    /**
     * @param $examCode
     *
     * @return $this
     */
    public function setExamCode($examCode)
    {
        $this->examCode = $examCode;

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
    public function getRoomCode()
    {
        return $this->roomCode;
    }

    /**
     * @param $roomCode
     *
     * @return $this
     */
    public function setRoomCode($roomCode)
    {
        $this->roomCode = $roomCode;

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
     * @param $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Exam
     */
    public function getExam()
    {
        return $this->exam;
    }

    /**
     * @param $exam
     *
     * @return $this
     */
    public function setExam($exam)
    {
        $this->exam = $exam;

        return $this;
    }

    /**
     * @return array
     */
    public function getSubscriptions()
    {
        $subscriptionService = new SubscriptionService();
        $subscriptions = $subscriptionService->fetchSubscriptions($this->getId());

        return $subscriptions;
    }
}
