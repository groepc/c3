<?php
namespace models;

use core\Model;

class EvaluationService extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getEvaluationById($id)
    {
        $data = $this->_db->select("SELECT * FROM evaluation WHERE id = :id", array(':id' => $id));

        $evaluation = new Evaluation();
        $evaluation->setData($data[0]);

        return $evaluation;
    }

    public function fetchEvaluationByExamCode($code, $userid)
    {
        $data = $this->_db->select("SELECT * FROM evaluatie WHERE tentamenCode = :code AND gebruikerID = :userid", array(':code' => $code, ':userid' => $userid));

        $evaluation = new Evaluation();
        $evaluation->setData($data[0]);

        return $evaluation;
    }

    public function getEvaluation()
    {
        $data = $this->_db->select("SELECT * FROM evaluatie");

        $evaluationArray = array();
        foreach ($data as $evaluationData)
        {
            $evaluation = new Evaluation();
            $evaluation->setData($evaluationData);

            $userService = new UserService();
            $user = $userService->getUserById($evaluation->getUserId());
            $evaluation->setUser($user);

            $examService = new ExamService();
            $exam = $examService->getExamByCode($evaluation->getExamCode());
            $evaluation->setExam($exam);

            $evaluationArray[] = $evaluation;
        }

        return $evaluationArray;
    }
}