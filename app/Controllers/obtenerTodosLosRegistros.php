<?php

namespace App\Controllers;

use App\Models\Datosbd_models;

class obtenerTodosLosRegistros extends BaseController
{
    private $Datosbd_models; // Declarar la propiedad para evitar la advertencia

    public function __construct()
    {
        $this->Datosbd_models = new Datosbd_models(); // Carga el modelo
    }

    public function UsuariosCG()
    {
        // Obtener solo los primeros 10 registros
        $datos['registros'] = $this->Datosbd_models->obtenerDiezPrimerosRegistros();

        // Cargar vista y pasar datos
        return view('CGView/UsuariosCG', $datos);
    }

    public function Buscar()
    {
        $query = $this->request->getPost('query');

        // Lógica para buscar en el modelo
        $data['registros'] = $this->Datosbd_models->buscarRegistros($query);

        // Cargar la vista con los resultados de la búsqueda
        return view('CGView/UsuariosCG', $data);
    }

    public function editar($cedula)
    {
        // Obtener detalles del empleado por cédula
        $datos['empleado'] = $this->Datosbd_models->obtenerEmpleadoPorCedula($cedula);

        // Cargar vista de edición con los detalles del empleado
        return view('CGView/editarEmpleadoView', $datos);
    }

    public function guardarEdicion()
    {
        // Recuperar datos del formulario de edición
        $cedula = $this->request->getPost('cedula');
        $nombre = $this->request->getPost('nombre');
        $area = $this->request->getPost('area');
        $codigo = $this->request->getPost('codigo');
        $estado = $this->request->getPost('estado');

        // Lógica para actualizar los datos en el modelo
        $this->Datosbd_models->actualizarEmpleado($cedula, $nombre, $area, $codigo, $estado);

        // Redireccionar a la vista de UsuariosCG con un mensaje de éxito
        return redirect()->to('UsuariosCG')->with('success', '¡Empleado actualizado exitosamente!');
    }
}
