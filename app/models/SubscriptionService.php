<?php

namespace models;

use core\Model;

class SubscriptionService extends Model
{
    public function fetchSubscriptions($planningId)
    {
        $data = $this->_db->select('SELECT * FROM inschrijving WHERE planningID = :id', array(':id' => $planningId));

        $subscriptionArray = array();
        foreach ($data as $subscriptionData) {
            $subscription = new Subscription();
            $subscription->setData($subscriptionData);

            $userService = new UserService();
            $user = $userService->getUserById($subscription->getUserId());
            $subscription->setUser($user);

            $planningService = new PlanningService();
            $planning = $planningService->fetchPlanningById($subscription->getPlanningId());
            $subscription->setPlanning($planning);

            $subscriptionArray[] = $subscription;
        }

        return $subscriptionArray;
    }

    public function completeGrades($planningId)
    {
        $subscriptions = $this->fetchSubscriptions($planningId);

        /** @var Subscription $subscription */
        foreach ($subscriptions as $subscription) {
            if (!$subscription->getGrade()) {
                $data['cijfer'] = 'N/A';
                $where['planningID'] = $subscription->getPlanningId();
                $where['gebruikerID'] = $subscription->getUserId();
                $this->_db->update('inschrijving', $data, $where);
            }
        }

        return true;
    }
}
