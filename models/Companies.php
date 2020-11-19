<?php

/* Companies MODEL */ 

class Companies extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }

    public function login($email, $password) {
        $validUser = false; 

        $this->db->query("SELECT * FROM companies WHERE email='$email' and password='$password' LIMIT 1");
        
        if($this->db->numRows() == 1) { 
            $userData = $this->db->fetch(); 
            $_SESSION['loged'] = true;
            $_SESSION['username'] = $userData['name'];
            $validUser = true; 
        }
        return $validUser; 
    }
}
