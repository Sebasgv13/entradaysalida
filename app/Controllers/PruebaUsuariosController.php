<?php

namespace App\Controllers;

use App\Models\PruebaUsuariosModel;

class PruebaUsuariosController extends BaseController {
    public function PruebaUsuariosCG() {
        // Cargar el modelo
        $PruebaUsuariosModel = new PruebaUsuariosModel();
    
        // Obtener todos los registros
        $datos['usuarios'] = $PruebaUsuariosModel->obtenerRegistros();
    
        // Cargar vista y pasar datos
        return view('CGView/UsuariosRegistrados', $datos);
    }
}
