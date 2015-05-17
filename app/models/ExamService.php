<?php

namespace models;

use core\Model;

class ExamService extends Model
{
    public function fetchExamByCode($code)
    {
        $data = $this->_db->select('SELECT * FROM tentamen WHERE code = :code', array(':code' => $code));

        $exam = new Exam();
        $exam->setData($data[0]);

        return $exam;
    }

    public function fetchExams($offset = 0, $amount = 100)
    {
        $query = 'SELECT *
                  FROM tentamen t
                  LEFT OUTER JOIN planning p
                  ON (t.code = p.tentamencode)
                  WHERE p.tentamencode IS NULL
                  LIMIT :offset, :amount';
        $data = $this->_db->select(
            $query,
            array(
                ':offset' => $offset,
                ':amount' => $amount
            )
        );

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

    public function getPeriods($offset = 0, $amount = 20)
    {
        $data = $this->_db->select('SELECT periode FROM tentamen GROUP BY periode LIMIT :offset, :amount', array(':offset' => $offset, ':amount' => $amount));

        $periods = array();
        foreach ($data as $row) {
            $periods[] = (int) $row->periode;
        }
        rsort($periods);

        return $periods;
    }

    public function getExamByPeriod($period)
    {
        $data = $this->_db->select('SELECT * FROM tentamen WHERE periode = :period', array(':period' => $period));

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
}
