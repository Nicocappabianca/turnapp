<?php

/* Companies MODEL */ 

class Companies extends Model{

    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->fetchAll(); 
    }

    public function getCompany( $id ) { 
        $this->db->query("SELECT * FROM companies WHERE id = '$id'"); 
        return $this->db->fetch();
    }

    public function login($email, $password) {
        $validUser = false; 

        // data sanitization
        $email = $this->db->escapeWildcards($this->db->escape($email)); 

        $this->db->query("SELECT * FROM companies WHERE email='$email' and password='$password' LIMIT 1");
        
        if($this->db->numRows() == 1) { 
            $userData = $this->db->fetch(); 
            $_SESSION['loged'] = true;
            $_SESSION['companyName'] = $userData['name'];
            $_SESSION['companyId'] = $userData['id'];
            $_SESSION['companyImg'] = $userData['url_image'];
            $_SESSION['isAdmin'] = true;
            $validUser = true; 
        }
        return $validUser; 
    }

    public function signup($name, $email, $password, $description, $url_image, $address) {
        $validCompany = false;

        // data sanitization
        $name = $this->db->escapeWildcards($this->db->escape($name)); 
        $email = $this->db->escapeWildcards($this->db->escape($email)); 
        $description = $this->db->escapeWildcards($this->db->escape($description)); 
        $url_image = $this->db->escapeWildcards($this->db->escape($url_image)); 
        $address = $this->db->escapeWildcards($this->db->escape($address)); 

        $this->db->query("SELECT * FROM companies WHERE email='$email' LIMIT 1");

        if($this->db->numRows() == 1) {
            return $validCompany;
        } else {
            $this->db->query("INSERT INTO companies (name, email, password, description, url_image, address)
                                VALUES ('$name', '$email', '$password', '$description', '$url_image', '$address')");
            $validCompany = true;
            return $validCompany;
        }
    }
}
