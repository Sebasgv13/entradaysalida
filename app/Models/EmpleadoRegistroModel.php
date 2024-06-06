<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoRegistroModel extends Model
{
    protected $table = 'empleados'; // Asegúrate de ajustar el nombre de la tabla de empleados

    protected $allowedFields = ['cedula', 'nombre', 'area', 'codigo', 'estado']; // Campos permitidos para insertar

    protected $useTimestamps = false; // Si tienes campos de timestamp, configúralos aquí

    // Aquí podrías tener validaciones adicionales, reglas de validación, etc.
}
