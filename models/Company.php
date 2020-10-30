<?php

class Company  {
    
    private $db; 

    public function __construct() { 
        $this->db = Database::getInstance(); 
    }

    public function getAll() { 
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }
}
