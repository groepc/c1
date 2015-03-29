<?php namespace controllers;
use core\view;
use helpers\session;
use helpers\url;

/*
 * Dashboard controller
 *
 */
class Dashboard extends \core\controller{

    /**
     * Call the parent construct
     */
    public function __construct(){
        parent::__construct();

        if(Session::get('login') == false){
            url::redirect('');
        }
    }

    /**
     * Define Index page title and load template files
     */
    public function index() {
        $data['title'] = 'Dashboard';

        View::rendertemplate('header', $data);
        View::render('dashboard/dashboard', $data);
        View::rendertemplate('footer', $data);
    }

    public function tentamens() {
        $exam = $this->loadModel('Exam');

        $data['title'] = 'Tentamens';
        $data['exams'] = $exam->getAllExams();

        View::rendertemplate('header', $data);
        View::render('dashboard/tentamen', $data);
        View::rendertemplate('footer', $data);
    }
}
