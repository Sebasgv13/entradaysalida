<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'ID_USUARIO';
    protected $allowedFields = ['NOMBRE', 'NUSUARIO', 'CONTRASENA', 'TIPO_USUARIO'];

    public function autenticar_usuario($nusuario, $contrasena)
    {
        $usuario = $this->where('NUSUARIO', $nusuario)->first();

        if (!$usuario) {
            // Usuario no encontrado
            return false;



            
        }

        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['CONTRASENA'])) {
            return $usuario;
        }

        return false;
    }

    // Nuevo método para obtener usuario por nombre de usuario
    public function obtenerUsuario($data)
{
    try {
        return $this->where($data)->first();
    } catch (\Exception $e) {
        $this->logger->error('Error al obtener usuario: ' . $e->getMessage());
        return false;
    }
}

}