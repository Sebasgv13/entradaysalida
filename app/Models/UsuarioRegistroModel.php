<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioRegistroModel extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'id'; // Asegúrate de ajustar el nombre de la clave primaria según tu estructura
    protected $allowedFields = ['nombre', 'nusuario', 'contrasena', 'tipo_usuario'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nombre' => 'required',
        'nusuario' => 'required|is_unique[usuarios.nusuario]', // Asegúrate de que sea único
        'contrasena' => 'required',
        'tipo_usuario'=> 'required'
    ];

    protected $validationMessages = [
        'nusuario' => [
            'is_unique' => 'El nombre de usuario ya está en uso'
        ]
    ];

    protected $validation = true;

    // Eliminamos el método beforeInsert ya que no queremos hashear la contraseña
}
