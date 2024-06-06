<?php
namespace App\Controllers;

use App\Models\UsuarioRegistroModel;

class RegistroController extends BaseController {
    public function mostrarFormularioRegistro() {
        return view('/CGView/Registro');
    }
    
    public function registrarUsuario() {
        $nombre = $this->request->getPost('nombre');
        $nusuario = $this->request->getPost('nusuario');
        $contrasena = $this->request->getPost('contrasena');  // Asegúrate de que estás utilizando 'contraseña' y no 'contrasena'
        $tipo_usuario = $this->request->getPost('tipo_usuario');
        
        // NO RECOMENDADO: Almacenar la contraseña sin hashear
        $data = [
            'nombre' => $nombre,
            'nusuario' => $nusuario,
            'contrasena' => $contrasena,
            'tipo_usuario' => $tipo_usuario
        ];
        
        $usuarioModel = new UsuarioRegistroModel();
        $usuarioModel->insert($data);

        return redirect()->to('mostrarFormularioRegistro')->with('success', '¡Registro de ingreso exitoso!');
    }
}