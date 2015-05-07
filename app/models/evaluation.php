<?php namespace models;

class Evaluation extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function getTotalEvaluations($tentamenCode) {
        return $this->_db->select("SELECT count(*) FROM evaluatie WHERE tentamenCode = :tentamenCode", array(':tentamenCode' => $tentamenCode));
    }

    public function getEvaluationsByCode($tentamenCode) {
        return $this->_db->select("SELECT * FROM evaluatie WHERE tentamenCode = :tentamenCode", array(':tentamenCode' => $tentamenCode));
    }

    public function insertEvaluation($data) {

        $data['created_at'] = date('Y-m-d H:i:s');
        $this->_db->insert('evaluatie', $data);

        return $this->_db->lastInsertId('ID');
    }

    public function updateExamScore($userId, $examId, $score) {
        $data = array(
            'cijfer' => $score
        );

        $where = array(
            'planningID' => $examId,
            'gebruikerID' => $userId
        );

        return $this->_db->update('inschrijving', $data, $where);
    }

    public function getEvaluationByUserId($tentamenCode, $userId) {
        return $this->_db->select("SELECT evaluatie.cijfer, evaluatie.document FROM evaluatie WHERE gebruikerID = :userId AND tentamenCode = :tentamenCode", array(':userId' => $userId, ':tentamenCode' => $tentamenCode));
    }
}