<?php

/* Reservations MODEL */ 

class Reservations extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM reservations
                            JOIN users on reservations.id_user = users.id
                            JOIN shifts on shifts.id = reservations.id_turn
                            JOIN companies on shifts.id_company = companies.id");
        return $this->db->fetchAll(); 
    }
}
