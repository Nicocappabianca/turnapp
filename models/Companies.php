<?php

/* Companies MODEL */ 

class Companies extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }
}
