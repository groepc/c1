<?php namespace controllers;
use core\view;
use helpers\session;
use helpers\url;

/*
 * Dashboard controller
 *
 */
class Results extends \core\controller{

	public $resultsModel = null;


	/**
	 * Call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		if(Session::get('login') == false){
			url::redirect('');
		}

		$this->resultsModel = $this->loadModel('Result');
	}

	public function index() {

		$data['title'] = 'Resultaten invoeren';
		$data['pastExams'] = $this->resultsModel->getPastExams();



		View::rendertemplate('header', $data);
		View::render('results/index', $data);
		View::rendertemplate('footer', $data);
	}

	public function edit($id) {

		$data['saved'] = false;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			foreach($_POST['result'] as $userId => $result) {
				$this->resultsModel->updateExamScore($userId, $id, $result);
			}

			$data['saved'] = true;
		}

		$examInfo = $this->resultsModel->getExamInformationById($id);

		$data['title'] = $examInfo[0]->afgerond == 1 ? 'Resultaten bekijken' : 'Resultaten invoeren';
		$data['subtitle'] = $examInfo[0]->code . ' - ' . $examInfo[0]->vak . ' - ' . date("j F, Y", strtotime($examInfo[0]->datumtijd));
		$data['examInfo'] = $examInfo;
		$data['pastExams'] = $this->resultsModel->getEntriesForExam($id);

		View::rendertemplate('header', $data);
		View::render('results/edit', $data);
		View::rendertemplate('footer', $data);
	}
}
