<?php namespace controllers;
use core\view;

class Administration extends \core\controller
{
	/**
	 * Call the parent construct
	 */
	public function __construct(){
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
}
