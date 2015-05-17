<?php

namespace models;

use core\Model;

class EvaluationService extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertEvaluation($data)
    {
        $this->_db->insert('evaluatie', $data);

        return $this->_db->lastInsertId('ID');
    }

    public function getEvaluationById($id)
    {
        $data = $this->_db->select('SELECT * FROM evaluation WHERE id = :id', array(':id' => $id));

        $evaluation = new Evaluation();
        $evaluation->setData($data[0]);

        return $evaluation;
    }

    public function fetchEvaluationByExamCode($code, $userid)
    {
        $data = $this->_db->select('SELECT * FROM evaluatie WHERE tentamenCode = :code AND gebruikerID = :userid', array(':code' => $code, ':userid' => $userid));

        $evaluation = new Evaluation();
        $evaluation->setData($data[0]);

        return $evaluation;
    }

    public function fetchEvaluations($userID, $offset = 0, $amount = 100)
    {
        $data = $this->_db->select('SELECT DISTINCT tentamen.code, tentamen.*, evaluatie.created_at eca FROM tentamen '
                . 'LEFT JOIN evaluatie ON (evaluatie.gebruikerID=:userID AND evaluatie.tentamenCode=tentamen.code) ' 
                .' LIMIT :offset, :amount', array(':userID' => $userID, ':offset' => $offset, ':amount' => $amount));

        $examArray = array();
        foreach ($data as $examData) {
            $exam = new Exam();
            $exam->setData($examData);

            $userService = new UserService();
            $user = $userService->getUserById($exam->getUserId());
            $exam->setUser($user);

            $examArray[] = $exam;
        }

        return $examArray;
    }
    
    public function checkEvaluation($idUser, $code) {
        $result = $this->_db->select("SELECT *, DATE_FORMAT(created_at, '%d-%m-%Y') datumeu, DATE_FORMAT(created_at, '%H:%i') insertTime  FROM evaluatie WHERE gebruikerID=:id AND tentamenCode=:code LIMIT 1", array(':id' => $idUser, ':code' => $code));
        if (!empty($result)) {
            return $result[0];
        } else {
            return false;
        }
    }
}
