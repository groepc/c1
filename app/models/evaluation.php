<?php namespace models;

class Evaluation extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function insertEvaluation($data) {
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
}