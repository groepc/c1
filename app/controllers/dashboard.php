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

        if(Session::get('loggin') == false){
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

    /**
     * Define Subpage page title and load template files
     */
    public function subpage() {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::rendertemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::rendertemplate('footer', $data);
    }
}
