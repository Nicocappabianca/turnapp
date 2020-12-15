<?php

/* Companies MODEL */ 

class Shifts extends Model{

    public function getAvailableShifts( $companyId ) {
        if( !ctype_digit($companyId) ) die('Error: El ID de la empresa debe ser un número');  

        $this->db->query("SELECT * FROM shifts WHERE id_company = $companyId and date >= CURDATE() ORDER BY date ASC");
        $dates = $this->db->fetchAll();
        
        $days = array(); 

        foreach($dates as $date) { 
            $day = new DateTime($date['date']); 
            $day = $day->format('j.n.Y'); 
            $day = array('date' => $day, 'available' => $this->isAvailable($companyId, $date['date'])); 
            array_push($days, $day); 
        }
        
        return array_unique($days, SORT_REGULAR); 
    }
    
    private function isAvailable( $companyId, $date ) {
        if( !ctype_digit($companyId) ) die('Error: El ID de la empresa debe ser un número'); 

        $this->db->query("SELECT * FROM shifts WHERE id_company = '$companyId' and date = '$date' and available = 1");
        return ($this->db->numRows() > 0) ? true : false; 
    }

    public function getSchedules( $companyId, $date ) { 
        if( !ctype_digit($companyId) ) die('Error: El ID de la empresa debe ser un número'); 

        $this->db->query("SELECT id, time FROM shifts WHERE id_company = '$companyId' and date = '$date' and available = 1 ORDER BY time ASC");
        return $this->db->fetchAll();
    }

    public function disableShift( $companyId, $shiftId ) { 
        if( !ctype_digit($companyId) || !ctype_digit($shiftId) ) die('Error: Los datos ingresados solo pueden ser numeros'); 

        $this->db->query("UPDATE shifts SET available = '0' WHERE id_company = '$companyId' and id = '$shiftId'"); 
    }

    public function createShift($companyId, $date, $time) {
        if( !ctype_digit($companyId) ) die('Error: El ID de la empresa debe ser un número');  

        /* date validation */
        $year = explode('-', $date)[0];
        $month = explode('-', $date)[1];
        $day = explode('-', $date)[2]; 
        
        if( !checkdate($month, $day, $year) ) die('Error: La fecha ingresada es incorrecta'); 

        /* data sanitization */
        $companyId = $this->db->escapeWildcards($this->db->escape($companyId)); 
        $date = $this->db->escapeWildcards($this->db->escape($date));
        $time = $this->db->escapeWildcards($this->db->escape($time));

        return $this->db->query( "INSERT INTO shifts (id_company, date, time, available) 
        VALUES ('$companyId', '$date', '$time', '1')" ); 
    }
}
