<?php

/* Reservations MODEL */ 

class Reservations extends Model{

    public function getNextReservations( $userId ) {
        if( !is_numeric($userId) ) die('Error: El ID del usuario debe ser un número'); 

        $this->db->query("SELECT * FROM reservations
                            JOIN users on reservations.id_user = users.id
                            JOIN shifts on shifts.id = reservations.id_shift
                            JOIN companies on shifts.id_company = companies.id
                            WHERE reservations.id_user = '$userId' and shifts.date >= CURDATE() ORDER BY date ASC");
        return $this->db->fetchAll(); 
    }

    public function getPastReservations( $userId ) {
        if( !is_numeric($userId) ) die('Error: El ID del usuario debe ser un número'); 

        $this->db->query("SELECT * FROM reservations
                            JOIN users on reservations.id_user = users.id
                            JOIN shifts on shifts.id = reservations.id_shift
                            JOIN companies on shifts.id_company = companies.id
                            WHERE reservations.id_user = '$userId' and shifts.date < CURDATE() ORDER BY date ASC");
        return $this->db->fetchAll(); 
    }

    public function postReservation( $userId, $shiftId ) { 
        if( !is_numeric($userId) || !is_numeric($shiftId) ) die('Error: Los datos ingresados solo pueden ser numeros'); 

        return $this->db->query( "INSERT INTO reservations (id_user, id_shift) VALUES ('$userId', '$shiftId')" ); 
    }

    public function getAllByCompanyAvailable($companyId) {
        if( !is_numeric($companyId) ) die('Error: El ID de la empresa debe ser un número'); 

        $this->db->query("SELECT * FROM shifts
                            JOIN companies on shifts.id_company = companies.id
                            WHERE companies.id = $companyId and shifts.available = '1'
                            ORDER BY shifts.date ASC");
        return $this->db->fetchAll(); 
    }

    public function getAllByCompanyBusy($companyId) {
        if( !is_numeric($companyId) ) die('Error: El ID de la empresa debe ser un número'); 

        $this->db->query("SELECT * FROM reservations
                            JOIN shifts on shifts.id = reservations.id_shift
                            JOIN companies on shifts.id_company = companies.id
                            JOIN users on reservations.id_user = users.id
                            WHERE companies.id = $companyId and shifts.available = '0'
                            ORDER BY shifts.date ASC");
        return $this->db->fetchAll(); 
    }
}
