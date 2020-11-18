<?php

/* Companies MODEL */ 

class Users extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }

    public function getUser($email, $password) {
        $this->db->query("SELECT * FROM users
                                    WHERE email='$email' and password='$password'
                                    LIMIT 1");
        return $this->db->fetchAll(); 
    }
}
