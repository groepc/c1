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
    public $examModel = null;

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
        $this->examModel = $this->loadModel('Exam');
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
        $data['filledValues'] = $this->evaluationModel->getEvaluationByUserId($data['examInfo'][0]->code, Session::get('userid'));

        View::rendertemplate('header', $data);
        View::render('evaluation/create', $data);
        View::rendertemplate('footer', $data);
    }

    public function send($id) {

        $examInfo = $this->resultsModel->getExamInformationById($id);
        $data['evaluations'] = $this->evaluationModel->getEvaluationsByCode($examInfo[0]->code);
        $data['examenCode'] = $examInfo[0]->code;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->examModel->endExam($_POST['examenCode']);

            $message = 'Beste,<br><br>Bij deze de evaluatie van de recent gemaakte toets.<br><br>';

            $message .= '<table border="1" cellpadding="5">';
                $message .= '<thead>';
                    $message .= '<th>#</th>';
                    $message .= '<th>Cijfer</th>';
                    $message .= '<th>Opmerking</th>';
                    $message .= '<th>Datum</th>';
                $message .= '</thead>';
            $message .= '<tbody>';

            foreach ($data['evaluations'] as $key => $value) {
                $message .= '<tr>';
                    $message .= '<td>' . $value->ID . '</td>';
                    $message .= '<td>' . $value->cijfer . '</td>';
                    $message .= '<td>' . $value->document . '</td>';
                    $message .= '<td>' . $value->datumtijd . '</td>';
                $message .= '</tr>';
            }

            $message .= '</tbody>';
            $message .= '</table>';

            $message .= '<br>Met vriendelijke groet,<br><br>Score';

            $headers = "From: app@score.nl\r\n";
            $headers .= "Reply-To: app@score.nl\r\n";
            $headers .= "CC: app@score.nl\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            mail('vadiemjanssens@gmail.com', 'Evaluatie toets', $message, $headers);



            header("Location: /evaluatie");
            die();
        }

        $examInfo = $this->resultsModel->getExamInformationById($id);
        $data['evaluations'] = $this->evaluationModel->getEvaluationsByCode($examInfo[0]->code);
        $data['examenCode'] = $examInfo[0]->code;

        $data['title'] = 'Verzenden evaluaties';

        View::rendertemplate('header', $data);
        View::render('evaluation/send', $data);
        View::rendertemplate('footer', $data);
    }
}
