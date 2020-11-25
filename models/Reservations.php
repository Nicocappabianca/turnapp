<?php

/* Reservations MODEL */ 

class Reservations extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM reservations
                            JOIN users on reservations.id_user = users.id
                            JOIN shifts on shifts.id = reservations.id_shift
                            JOIN companies on shifts.id_company = companies.id");
        return $this->db->fetchAll(); 
    }

    public function postReservation( $userId, $shiftId ) { 
        return $this->db->query( "INSERT INTO reservations (id_user, id_shift) VALUES ('$userId', '$shiftId')" ); 
    }
}
