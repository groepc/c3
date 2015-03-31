<?php
namespace models;

use core\Model;

class ExamService extends Model
{
    public function getExamById($id)
    {

    }

    public function getExam($offset = 0, $amount= 100)
    {
        $data = $this->_db->select("SELECT * FROM tentamen LIMIT :offset, :amount", array(':offset' => $offset, ':amount' => $amount));

        $examArray = array();
        foreach ($data as $examData)
        {
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