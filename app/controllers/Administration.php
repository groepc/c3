<?php
namespace controllers;

use core\Controller;
use core\View;
use helpers\Session;
use helpers\Url;
use models\PlanningService;

class Administration extends Controller
{
	private $data;

	public function __construct()
	{
		if (Session::get('login') == false) {
			Url::redirect('auth/login');
		}

		$this->data['username'] = Session::get('username');
		$this->data['firstname'] = Session::get('firstname');
		$this->data['middlename'] = Session::get('middlename');
		$this->data['lastname'] = Session::get('lastname');

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
        $planningService = new PlanningService();

        $this->data['title'] = 'Planning Tentamens';
        $this->data['planning'] = $planningService->getPlanning(0, 10);

		View::rendertemplate('header', $this->data);
		View::render('administration/plan-exam', $this->data);
		View::rendertemplate('footer');
	}

	public function prepareExam()
	{
        $planningService = new PlanningService();

        $this->data['title'] = 'Voorbereiden Tentamens';
        $this->data['planning'] = $planningService->getPlanning(0, 10);

		View::rendertemplate('header', $this->data);
		View::render('administration/prepare-exam');
		View::rendertemplate('footer');
	}

	public function evaluateExam()
	{
		View::rendertemplate('header', $this->data);
		View::render('administration/evaluate-exam');
		View::rendertemplate('footer');
	}

	public function managementReporting()
	{
		View::rendertemplate('header', $this->data);
		View::render('administration/management-reporting');
		View::rendertemplate('footer');
	}
}
