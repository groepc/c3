<?php
namespace models;

use core\Model;

class Evaluation extends Model
{
    private $id;
    private $dateTime;
    private $grade;
    private $comment;
    private $examCode;
    private $userId;
    private $user;
    private $exam;

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
        $this->dateTime = $data->datumtijd;
        $this->grade = $data->cijfer;
        $this->comment = $data->document;
        $this->examCode = $data->tentamenCode;
        $this->userId = $data->gebruikerID;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

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
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getExam()
    {
        return $this->exam;
    }

    public function setExam($exam)
    {
        $this->exam = $exam;

        return $this;
    }
}