<?php

/* Companies MODEL */ 

class Users extends Model{
    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }

    public function login($email, $password) {
        $validUser = false; 

        $this->db->query("SELECT * FROM users WHERE email='$email' and password='$password' LIMIT 1");
        
        if($this->db->numRows() == 1) { 
            $userData = $this->db->fetch(); 
            $_SESSION['loged'] = true;
            $_SESSION['username'] = $userData['name'];
            $validUser = true; 
        }
        return $validUser; 
    }
}
