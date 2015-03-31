<?php
namespace models;

use core\Model;

class PlanningService extends Model
{
    public function getPlanningById($id)
    {

    }

    public function getPlanningByExamCode($code)
    {

    }

    public function getPlanning($offset = 0, $amount= 100)
    {
        $data = $this->_db->select("SELECT * FROM planning LIMIT :offset, :amount", array(':offset' => $offset, ':amount' => $amount));

        $planningArray = array();
        foreach ($data as $planningData)
        {
            $planning = new Planning();
            $planning->setData($planningData);

            $userService = new UserService();
            $user = $userService->getUserById($planning->getUserId());
            $planning->setUser($user);

            $planningArray[] = $planning;
        }

        return $planningArray;
    }
}