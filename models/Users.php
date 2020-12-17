<?php

/* Companies MODEL */ 

class Users extends Model{
    
    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }

    public function getUserById( $id ) { 
        if( !ctype_digit($id) ) throw new UsersException('Error: El ID del usuario debe ser un número'); 

        $this->db->query("SELECT * FROM users WHERE id = $id");
        return $this->db->fetch(); 
    }

    public function login($email, $password) {
        $validUser = false; 

        /* data sanitization */
        $email = $this->db->escapeWildcards($this->db->escape($email)); 

        $this->db->query("SELECT * FROM users WHERE email='$email' and password='$password' LIMIT 1");
        
        if($this->db->numRows() == 1) { 
            $userData = $this->db->fetch(); 
            $_SESSION['loged'] = true;
            $_SESSION['userName'] = $userData['name'];
            $_SESSION['userId'] = $userData['id'];
            $validUser = true; 
        }
        return $validUser; 
    }

    public function signup($email, $password, $name, $surname) {
        $validUser = false;

        /* data sanitization */
        $email = $this->db->escapeWildcards($this->db->escape($email)); 
        $name = $this->db->escapeWildcards($this->db->escape($name)); 
        $surname = $this->db->escapeWildcards($this->db->escape($surname)); 

        $this->db->query("SELECT * FROM users WHERE email='$email' LIMIT 1");

        if($this->db->numRows() == 1) {
            return $validUser;
        } else {
            $this->db->query("INSERT INTO users (name, surname, email, password)
                                VALUES ('$name', '$surname', '$email', '$password')");
            $validUser = true;
            return $validUser;
        }
    }
}

class UsersException extends Exception {}