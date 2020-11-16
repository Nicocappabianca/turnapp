<?php

/* Reservations MODEL */ 

class Reservations extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM reservations");
        return $this->db->fetchAll(); 
    }
}
