<?php

// models/Empresas.php

class Empresa extends Model{
    
    public function getAll() {
        $this->db->query("SELECT * FROM empleados");
        return $this->db->fetchAll()
    }
}
