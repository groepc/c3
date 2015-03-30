<?php
namespace controllers;

use core\Controller;
use core\View;
use helpers\Password;
use helpers\Session;
use helpers\Url;
use models\UserService;

class Auth extends Controller
{
	/**
	 * Call the parent construct
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		Url::redirect('auth/login');
	}

	/**
	 * Define Index page title and load template files
	 */
	public function login()
    {
		if (Session::get('login') == true) {
			Url::redirect('administration');
		}

		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$userService = new UserService();
			$user = $userService->getUserByUsername($username);

			if (!Password::verify($password, $user->getPassword())) {
				die('wrong username or password');
			}

			Session::set('login', true);
			Session::set('username', $username);
			Url::redirect('administration');
		}

		View::rendertemplate('header');
		View::render('auth/login');
		View::rendertemplate('footer');
	}

	public function logout()
	{
		Session::destroy();
		Url::redirect('administration');
	}
}
