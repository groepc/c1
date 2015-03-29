<?php namespace models;

class Result extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function getPastExams() {
        return $this->_db->select("SELECT planning.ID, planning.tentamencode, planning.datumtijd, tentamen.vak FROM planning, tentamen WHERE planning.datumtijd < CURDATE() AND planning.tentamencode = tentamen.code");
    }

    public function getEntriesForExam($code) {
        return $this->_db->select("SELECT gebruiker.voornaam, gebruiker.tussenvoegsel, gebruiker.achternaam, inschrijving.cijfer, inschrijving.planningID, inschrijving.gebruikerID FROM inschrijving, gebruiker WHERE inschrijving.gebruikerID = gebruiker.ID AND inschrijving.planningID = :code", array(':code' => $code));
    }

    public function getExamInformationById($code) {
        return $this->_db->select("SELECT tentamen.vak, tentamen.code, planning.datumtijd FROM tentamen, planning WHERE planning.tentamencode = tentamen.code AND planning.ID = :code", array(':code' => $code));
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