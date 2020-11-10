<?php
/* Framework MODEL */

abstract class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
}