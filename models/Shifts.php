<?php

/* Companies MODEL */ 

class Shifts extends Model{

    public function getAvailableShifts( $companyId ) {
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
        $this->db->query("SELECT * FROM shifts WHERE id_company = '$companyId' and date = '$date' and available = 1");
        return ($this->db->numRows() > 0) ? true : false; 
    }

    public function getSchedules( $companyId, $date ) { 
        $this->db->query("SELECT id, time FROM shifts WHERE id_company = '$companyId' and date = '$date' and available = 1 ORDER BY time ASC");
        return $this->db->fetchAll();
    }

    public function disableShift( $companyId, $shiftId ) { 
        $this->db->query("UPDATE shifts SET available = '0' WHERE id_company = '$companyId' and id = '$shiftId'"); 
    }

    public function createShift($companyId, $date, $time, $price) {
        return $this->db->query( "INSERT INTO shifts (id_company, date, time, available, price) 
        VALUES ('$companyId', '$date', '$time', '1', '$price')" ); 
    }
}
