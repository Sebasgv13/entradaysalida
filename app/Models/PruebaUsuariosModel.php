<?php

namespace App\Models;

use CodeIgniter\Model;

class PruebaUsuariosModel extends Model {
    protected $table = 'USUARIOS';

    public function obtenerRegistros() {
        return $this->findAll();
    }
}
