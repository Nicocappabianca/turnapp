<?php
// framework/Model.php

abstract class Model {
    protected $db;

    public function __contruct() {
        $this->db = Database::getInstance();
    }

}