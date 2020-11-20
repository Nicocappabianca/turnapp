<?php

/* Companies MODEL */ 

class Shifts extends Model{

    public function getAllDays( $companyId ) {
        $this->db->query("SELECT * FROM shifts WHERE id_company = $companyId  ORDER BY date ASC");
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
}
