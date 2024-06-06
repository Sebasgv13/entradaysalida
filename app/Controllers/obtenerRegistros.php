<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Datosbd_usuarios;

class obtenerRegistros extends BaseController
{
    // Propiedad para el modelo
    private $Datosbd_usuarios;

    public function Registros()
    {
        // Cargar el modelo
        $this->Datosbd_usuarios = new Datosbd_usuarios();

        // Obtener solo los primeros 10 registros
        $datos['REGISTROS'] = $this->Datosbd_usuarios->obtenerDiezPrimerosRegistros();

        // Cargar vista y pasar datos
        return view('CGView/Registros', ['registros' => $datos]);
    }
    
    public function __construct()
    {
        // Inicializar el modelo en el constructor
        $this->Datosbd_usuarios = new Datosbd_usuarios();
    }

    public function Buscar2()
    {
        $query = $this->request->getPost('query');

        $data['registros']['REGISTROS'] = $this->Datosbd_usuarios->buscarRegistros($query);

        return view('CGView/Registros', $data);
    }

    public function registrarIngreso($codigo) {
        $area = $this->Datosbd_usuarios->obtenerAreaPorCodigo($codigo);
        // Obtener el nombre de usuario de la sesión actual
        $nusuario = session('usuario');
        // Guardar el registro de ingreso con el código y el área
        $this->Datosbd_usuarios->guardarIngreso($codigo, $area, $nusuario);

        return redirect()->to('Registros')->with('success', '¡Registro de ingreso exitoso!');
    }

    public function registrarSalida($codigo) {
        $area = $this->Datosbd_usuarios->obtenerAreaPorCodigo($codigo);
         // Obtener el nombre de usuario de la sesión actual
        $nusuario = session('usuario');
        // Guardar el registro de salida con el código y el área
        $this->Datosbd_usuarios->guardarSalida($codigo, $area , $nusuario);

        return redirect()->to('Registros')->with('success', '¡Registro de salida exitoso!');
    }
}
