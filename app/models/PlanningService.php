<?php

namespace models;

use core\Model;

class PlanningService extends Model
{
    public function fetchPlanningByExamCode($code)
    {
        $data = $this->_db->select('SELECT * FROM planning WHERE tentamencode = :code', array(':code' => $code));

        $planningArray = array();
        foreach ($data as $planningData) {
            $planning = new Planning();
            $planning->setData($planningData);

            $userService = new UserService();
            $user = $userService->getUserById($planning->getUserId());
            $planning->setUser($user);

            $examService = new ExamService();
            $exam = $examService->fetchExamByCode($planning->getExamCode());
            $planning->setExam($exam);

            $planningArray[] = $planning;
        }

        return $planningArray;
    }

    public function fetchPlannings($offset = 0, $amount = 100)
    {
        $data = $this->_db->select('SELECT * FROM planning LIMIT :offset, :amount', array(':offset' => $offset, ':amount' => $amount));

        $planningArray = array();
        foreach ($data as $planningData) {
            $planning = new Planning();
            $planning->setData($planningData);

            $userService = new UserService();
            $user = $userService->getUserById($planning->getUserId());
            $planning->setUser($user);

            $examService = new ExamService();
            $exam = $examService->fetchExamByCode($planning->getExamCode());
            $planning->setExam($exam);

            $planningArray[] = $planning;
        }

        return $planningArray;
    }

    public function createPlanning($planningData)
    {
        $date = date('Y-m-d H:i:s', strtotime($planningData['dateTime']));

        $data['datumtijd'] = $date;
        $data['tentamencode'] = $planningData['examCode'];
        $data['gebruikerID'] = $planningData['userId'];
        $data['lokaalCode'] = $planningData['roomCode'];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        return $this->_db->insert('planning', $data);
    }

    public function deletePlanning($planningData)
    {
        $data['ID'] = $planningData['planningId'];

        $this->_db->delete('planning', $data);
    }
}
