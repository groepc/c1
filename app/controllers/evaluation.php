<?php namespace controllers;
use core\view;
use helpers\session;
use helpers\url;

/*
 * Dashboard controller
 *
 */
class Evaluation extends \core\controller{

    public $resultsModel = null;
    public $evaluationModel = null;

    /**
     * Call the parent construct
     */
    public function __construct(){
        parent::__construct();

        if(Session::get('login') == false){
            url::redirect('');
        }

        $this->resultsModel = $this->loadModel('Result');
        $this->evaluationModel = $this->loadModel('Evaluation');
    }

    public function index() {

        $data['title'] = 'Opstellen evaluatie';
        $data['pastExams'] = $this->resultsModel->getPastExams();

        View::rendertemplate('header', $data);
        View::render('evaluation/index', $data);
        View::rendertemplate('footer', $data);
    }

    public function edit($id) {

        $data['created'] = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $data['gebruikerID'] = Session::get('userid');

            $this->evaluationModel->insertEvaluation($data);

            $data['created'] = true;
        }

        $data['title'] = 'Opstellen evaluatie';
        $data['examInfo'] = $this->resultsModel->getExamInformationById($id);

        View::rendertemplate('header', $data);
        View::render('evaluation/create', $data);
        View::rendertemplate('footer', $data);
    }
}
