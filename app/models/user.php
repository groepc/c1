<?php namespace models;

class User extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function checkCredentials($username, $password) {

    }

    public function getUserByUsername($username) {
        return $this->_db->select("SELECT * FROM gebruiker WHERE gebruikersnaam = :gebruikersnaam LIMIT 1", array(':gebruikersnaam' => $username));
    }

    public function getUsers(){
        return $this->_db->select('SELECT * FROM gebruiker');
    }

}