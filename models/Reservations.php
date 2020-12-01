<?php

/* Reservations MODEL */ 

class Reservations extends Model{

    public function getNextReservations( $userId ) {
        $this->db->query("SELECT * FROM reservations
                            JOIN users on reservations.id_user = users.id
                            JOIN shifts on shifts.id = reservations.id_shift
                            JOIN companies on shifts.id_company = companies.id
                            WHERE reservations.id_user = '$userId' and shifts.date >= CURDATE() ORDER BY date ASC");
        return $this->db->fetchAll(); 
    }

    public function getPastReservations( $userId ) {
        $this->db->query("SELECT * FROM reservations
                            JOIN users on reservations.id_user = users.id
                            JOIN shifts on shifts.id = reservations.id_shift
                            JOIN companies on shifts.id_company = companies.id
                            WHERE reservations.id_user = '$userId' and shifts.date < CURDATE() ORDER BY date ASC");
        return $this->db->fetchAll(); 
    }

    public function postReservation( $userId, $shiftId ) { 
        return $this->db->query( "INSERT INTO reservations (id_user, id_shift) VALUES ('$userId', '$shiftId')" ); 
    }

    public function getAllByCompanyAvailable($companyId) {
        $this->db->query("SELECT * FROM reservations
        JOIN shifts on shifts.id = reservations.id_shift
        JOIN companies on shifts.id_company = companies.id
        JOIN users on reservations.id_user = users.id
        WHERE companies.id = $companyId and shifts.available = '1'
        ORDER BY shifts.date ASC");
        return $this->db->fetchAll(); 
    }

    public function getAllByCompanyBusy($companyId) {
        $this->db->query("SELECT * FROM reservations
        JOIN shifts on shifts.id = reservations.id_shift
        JOIN companies on shifts.id_company = companies.id
        JOIN users on reservations.id_user = users.id
        WHERE companies.id = $companyId and shifts.available = '0'
        ORDER BY shifts.date ASC");
        return $this->db->fetchAll(); 
    }
}
