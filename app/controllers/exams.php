<?php namespace controllers;
use core\view;
use helpers\session;
use helpers\url;

/*
 * Dashboard controller
 *
 */
class Exams extends \core\controller{

    public $exam = null;

    /**
     * Call the parent construct
     */
    public function __construct(){
        parent::__construct();

        if(Session::get('login') == false){
            url::redirect('');
        }

        $this->exam = $this->loadModel('Exam');
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {


        $data['title'] = 'Tentamens';
        $data['exams'] = $this->exam->getAllExams();

        View::rendertemplate('header', $data);
        View::render('exams/index', $data);
        View::rendertemplate('footer', $data);
    }

    public function create() {

        $data['created'] = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $is_valid = \helpers\gump::is_valid($_POST, array(
                'examCode' => 'required',
                'examSpeciality' => 'required',
                'examPeriod' => 'required|numeric',
                'examStudents' => 'required|numeric'
            ));

            if($is_valid === true) {

                $params = array(
                    'code' => $_POST['examCode'],
                    'vak' => $_POST['examSpeciality'],
                    'periode' => $_POST['examPeriod'],
                    'aantalStudenten' => $_POST['examStudents'],
                    'computerlokaal' => $_POST['examComputerRoom'] ? 1 : 0,
                    'surveillant' => $_POST['examSurveillance'] ? 1 : 0,
                    'gebruikerID' => Session::get('userid')
                );

                if($this->exam->createExam($params) == 0) {
                    $data['created'] = true;
                }
            }

        }

        $data['title'] = 'Tentamens';
        $data['subtitle'] = 'Aanvragen';

        View::rendertemplate('header', $data);
        View::render('exams/create', $data);
        View::rendertemplate('footer', $data);
    }
}