<?php

/* Companies MODEL */ 

class Shifts extends Model{

    public function getAllDays( $companyId ) {
        $this->db->query("SELECT * FROM shifts WHERE id_company = $companyId  ORDER BY date_time ASC");
        $dates = $this->db->fetchAll();
        
        $days = array(); 

        foreach($dates as $date) { 
            $day = new DateTime($date['date_time']); 
            $day = $day->format('j.n.Y'); 
            $day = array('date' => $day, 'available' => $date['available']); 
            array_push($days, $day); 
        }
        
        return array_unique($days, SORT_REGULAR); 
    }
}
