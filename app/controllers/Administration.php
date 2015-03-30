<?php
namespace controllers;

use core\Controller;
use core\View;
use helpers\Session;
use helpers\Url;

class Administration extends Controller
{
	/**
	 * Call the parent construct
	 */
	public function __construct()
	{
		if (Session::get('login') == false) {
			Url::redirect('auth/login');
		}

		parent::__construct();
	}

	/**
	 * Define Index page title and load template files
	 */
	public function index()
    {
		View::rendertemplate('header');
		View::render('administration/index');
		View::rendertemplate('footer');
	}

	public function evaluation()
	{

	}
}
