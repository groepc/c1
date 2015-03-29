<?php namespace controllers;
use core\view;
use models\user;
use helpers\session;
use helpers\url;

/*
 * Session controller
 *
 */
class Auth extends \core\controller{

	/**
	 * Call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Define Index page title and load template files
	 */
	public function index() {


		// user already logged in? Redirect to the dashboard
		if(Session::get('login') === true) {
			Url::redirect('dashboard');
		}

		// login action, verify input and check if user exists
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$is_valid = \helpers\gump::is_valid($_POST, array(
			    'username' => 'required|alpha_numeric',
			    'password' => 'required'
			));

			if($is_valid === true) {

				$user = $this->loadModel('User');
				$user = $user->getUserByUsername($_POST['username']);

				if($user) {
					$user = $user[0];

					if( ($user->gebruikersnaam === $_POST['username']) && ($user->wachtwoord === md5($_POST['password'])) ) {

						Session::set('login', true);
						Session::set('userid', $user->ID);
						Session::set('userfirstname', $user->voornaam);
						Url::redirect('dashboard');

					} else {
						unset($is_valid);
						$is_valid[] = 'Gebruikersnaam en wachtwoord komen niet overeen.';
					}
				} else {
					unset($is_valid);
					$is_valid[] = 'Gebruikersnaam en wachtwoord komen niet overeen.';
				}
			}
		}

		// render the login view
		$data['title'] = 'Login page';
		View::render('auth/login', $data, $is_valid);
	}

	public function logout() {
		Session::destroy();
		url::redirect('');
	}

}
