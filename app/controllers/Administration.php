<?php

namespace controllers;

use core\Controller;
use core\View;
use helpers\Session;
use helpers\Url;
use models\Evaluation;
use models\EvaluationService;
use models\Exam;
use models\ExamService;
use models\PlanningService;
use models\RoomService;
use models\SubscriptionService;

class Administration extends Controller
{
    private $data;
    private $examService;
    private $planningService;
    private $evaluationService;
    private $roomService;
    private $subscriptionService;

    public function __construct()
    {
        if (Session::get('login') == false) {
            Url::redirect('auth/login');
        }

        $this->data['userid'] = Session::get('userid');
        $this->data['fullname'] = Session::get('fullname');

        $this->examService = new ExamService();
        $this->planningService = new PlanningService();
        $this->evaluationService = new EvaluationService();
        $this->roomService = new RoomService();
        $this->subscriptionService = new SubscriptionService();

        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Dashboard';

        $this->data['examsShort'] = $this->examService->fetchExams(0, 5);
        $this->data['prepareExamShort'] = $this->planningService->fetchPlannings(0, 5);
        $this->data['evaluateExamShort'] = $this->examService->fetchExams(0, 5);

        View::rendertemplate('header', $this->data);
        View::render('administration/index', $this->data);
        View::rendertemplate('footer');
    }

    public function planExam()
    {
        if (isset($_POST['create'])) {
            $planningData = array(
                'examCode' => $_POST['examCode'],
                'roomCode' => $_POST['planningRoom'],
                'dateTime' => $_POST['planningDate'],
                'userId' => $this->data['userid'],
            );

            $insertId = $this->planningService->createPlanning($planningData);

            if (!$insertId) {
                $this->data['error'] = 'FOUT';
            }

            $this->data['message'] = 'Tentamen ' . $planningData['examCode'] . ' is nu ingepland op ' . $planningData['dateTime'];
        }

        if (isset($_POST['delete'])) {
            $planningData = array(
                'planningId' => $_POST['planningId'],
                'examCode' => $_POST['examCode'],
            );

            $this->planningService->deletePlanning($planningData);

            $this->data['message'] = 'Planning #' . $planningData['planningId'] . ' met examen code ' . $planningData['examCode'] . ' is verwijderd';
        }

        try {
            $exams = $this->examService->fetchExams(0, 50);
            $plannings = $this->planningService->fetchPlannings(0, 50);
            $rooms = $this->roomService->fetchRooms();
        } catch (\Exception $ex) {
            var_dump($ex->getMessage());
            exit;
        }

        $this->data['title'] = 'Planning Tentamens';
        $this->data['exams'] = $exams;
        $this->data['plannings'] = $plannings;
        $this->data['rooms'] = $rooms;

        View::rendertemplate('header', $this->data);
        View::render('administration/plan-exam', $this->data);
        View::rendertemplate('footer');
    }

    public function prepareExam()
    {
        $this->data['title'] = 'Overzicht Tentamens';
        $this->data['planning'] = $this->planningService->fetchPlannings(0, 50);

        View::rendertemplate('header', $this->data);
        View::render('administration/prepare-exam', $this->data);
        View::rendertemplate('footer');
    }

    public function prepareExamView()
    {
        if (!$_GET['planningId']) {
            Url::redirect('administration/prepare-exam');
        }

        $planningId = $_GET['planningId'];

        if (isset($_POST['process'])) {
            $presentArray = array();
            foreach ($_POST as $key => $value) {
                if (substr($key, 0, 8) != "present_") {
                    continue;
                }

                $newKey = str_replace('present_', '', $key);
                $presentArray[$newKey] = $value;
            }

            $this->subscriptionService->completeAttendees($planningId, $presentArray);
            $this->subscriptionService->completeGrades($planningId);

            $this->data['message'] = 'Tentamen is verwerkt.';
        }

        $this->data['title'] = 'Overzicht Tentamen';
        $this->data['planning'] = $this->planningService->fetchPlanningById($planningId);
        $this->data['subscription'] = $this->subscriptionService->fetchSubscriptions($planningId);

        View::rendertemplate('header', $this->data);
        View::render('administration/prepare-exam-view', $this->data);
        View::rendertemplate('footer');
    }

    public function prepareExamProcess()
    {
        if (!$_GET['planningId']) {
            Url::redirect('administration/prepare-exam');
        }

        $planningId = $_GET['planningId'];

        $this->data['title'] = 'Afronden Tentamen';
        $this->data['planning'] = $this->planningService->fetchPlanningById($planningId);
        $this->data['subscription'] = $this->subscriptionService->fetchSubscriptions($planningId);

        View::rendertemplate('header', $this->data);
        View::render('administration/prepare-exam-process', $this->data);
        View::rendertemplate('footer');
    }

    public function evaluateExam()
    {
        $this->data['title'] = 'Evaluatie Tentamens';
        $this->data['exams'] = $this->evaluationService->fetchEvaluations($this->data['userid'],0, 50);

        View::rendertemplate('header', $this->data);
        View::render('administration/evaluate-exam', $this->data);
        View::rendertemplate('footer');
    }

    public function evaluateExamView()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $data['gebruikerID'] = $this->data['userid'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->evaluationService->insertEvaluation($data);
        }

        if (!$_GET['code']) {
            Url::redirect('administration/evaluate-exam');
        }

        $examCode = $_GET['code'];
        $userid = $this->data['userid'];

        $this->data['title'] = 'Evaluatie Tentamens';
        $evaluation = $this->evaluationService->fetchEvaluationByExamCode($examCode, $userid);
        $this->data['examCode'] = $examCode;

        $this->data['evaluation'] = new Evaluation();
        if ($evaluation->getId()) {
            $this->data['evaluation'] = $evaluation;
        }
        $evaluationCheck = $this->evaluationService->checkEvaluation($userid, $examCode);

        View::rendertemplate('header', $this->data);
        if (!empty($evaluationCheck)) {
            $this->data['created_at'] = $evaluationCheck;
            View::render('administration/evaluate-exam-view', $this->data);
        } else {
            View::render('administration/evaluate-exam-insert', $this->data);
        }
        View::rendertemplate('footer');
    }

    public function managementReporting() {
        $this->data['title'] = 'Management Rapportage';

        View::rendertemplate('header', $this->data);
        View::render('administration/management-reporting', $this->data);
        View::rendertemplate('footer');
    }

}
