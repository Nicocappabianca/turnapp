<?php

/* Companies MODEL */ 

class Shifts extends Model{

    public function getAllDays( $companyId ) {
        $this->db->query("SELECT * FROM shifts WHERE id_company = $companyId");
        $days = $this->db->fetchAll();
        
        $daysArray = array(); 

        foreach($days as $day) { 
            $day = new DateTime($day); 
            $date = $dateTime->format('n.j.Y'); 

            array_push($daysArray, $date)
        }
    }
}
