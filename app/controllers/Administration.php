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

class Administration extends Controller
{
    private $data;
    private $examService;
    private $planningService;
    private $evaluationService;
    private $roomService;

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

        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Dashboard';

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

            $this->data['message'] = 'Tentamen '.$planningData['examCode'].' is nu ingepland op '.$planningData['dateTime'];
        }

        if (isset($_POST['delete'])) {
            $planningData = array(
                'planningId' => $_POST['planningId'],
                'examCode' => $_POST['examCode'],
            );

            $this->planningService->deletePlanning($planningData);

            $this->data['message'] = 'Planning #'.$planningData['planningId'].' met examen code '.$planningData['examCode'].' is verwijderd';
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
        $this->data['title'] = 'Voorbereiden Tentamens';
        $this->data['planning'] = $this->planningService->fetchPlannings(0, 50);

        View::rendertemplate('header', $this->data);
        View::render('administration/prepare-exam', $this->data);
        View::rendertemplate('footer');
    }

    public function evaluateExam()
    {
        $this->data['title'] = 'Evaluatie Tentamens';
        $this->data['exams'] = $this->examService->fetchExams(0, 50);

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

        View::rendertemplate('header', $this->data);
        View::render('administration/evaluate-exam-view', $this->data);
        View::rendertemplate('footer');
    }

    public function managementReporting()
    {
        $this->data['title'] = 'Management Rapportage';

        $reportArray = array();
        $periods = $this->examService->getPeriods();
        foreach ($periods as $period) {
            $exams = $this->examService->getExamByPeriod($period);
            $examCount = count($exams);

            $studentCount = 0;
            /** @var Exam $exam */
            foreach ($exams as $exam) {
                $studentCount += (int) $exam->getStudentAmount();

                $plannings = $this->planningService->fetchPlanningByExamCode($exam->getCode());
            }

            $reportArray[] = array(
                'period' => $period,
                'examCount' => $examCount,
                'studentCount' => $studentCount,
            );
        }

        $this->data['reporting'] = $reportArray;

        View::rendertemplate('header', $this->data);
        View::render('administration/management-reporting', $this->data);
        View::rendertemplate('footer');
    }
}
