<?php namespace models;

class Exam extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function getAllExams() {
        return $this->_db->select("SELECT * FROM tentamen");
    }

    public function getAllExamsByUser($id) {
        return $this->_db->select("SELECT * FROM tentamen WHERE gebruikerID = :id LIMIT 5", array(':id' => $id));
    }

    public function getLatestPlannedExams() {
        return $this->_db->select("SELECT * FROM planning ORDER BY datumtijd DESC LIMIT 5");
    }

    public function getExamByCode($code) {
        return $this->_db->select("SELECT * FROM tentamen WHERE code = :code LIMIT 1", array(':code' => $code));
    }

    public function createExam($params) {
        return $this->_db->insert('tentamen', $params);
    }
}