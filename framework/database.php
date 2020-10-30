<?php

require('./constants.inc'); /* FILE WITH DATABASE CREDENTIALS */

class Database { 
    private $connection = false; 
    private $response;
    private static $instance = false; 

    /* Singleton pattern */
    public static function getInstance() { 
        /* self:: is used for static methods */
        if(!self::$instance) self::$instance = new Database(); 
        return self::$instance; 
    }

    private function connect() { 
        $this->connection = mysqli_connect(SERVER,USER,PASSWORD,DATABASE); 
    }

    public function query($query) { 
        if(!$this->connection) $this->connect(); 
        $this->response = mysqli_query($this->connection, $query); 
        if(!$this->response) die(mysqli_error($this->connection) ." -- Query: " .$query); 
    }

    public function numRows() { 
        mysqli_num_rows($this->response); 
    }

    public function fetch() { 
        return mysqli_fetch_assoc($this->response); 
    }

    public function fetchAll() { 
        $aux = array(); 
        while($row = $this->fetch()) { 
            $aux[] = $row; 
        }
        return $aux; 
    }

    public function escape($str) { 
        if(!$this->connection) $this->connect(); 
        return mysqli_escape_string($this->connection, $str); 
    }

    public function escapeWildcards($str) { 
        $str = str_replace('%', '\%', $str); 
        $str = str_replace('_', '\_', $str); 
        return $str; 
    }
}