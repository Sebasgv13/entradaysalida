<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmpleadoRegistroModel;

class AgregarEmplController extends Controller
{
    public function agregarEmpleado()
    {
        return view('CGView/AgregarEmpView');
    }

    public function guardarEmpleado()
    {
        // Elimina estas líneas que detienen la ejecución
        // var_dump($_POST);
        // exit();

        // Imprime datos para depuración
        log_message('info', 'Datos del formulario: ' . json_encode($this->request->getPost()));

        // Obtener los datos del formulario
        $cedula = $this->request->getPost('cedula');
        $nombre = $this->request->getPost('nombre');
        $area = $this->request->getPost('Area'); // Corrige el nombre del campo
        $codigo = $this->request->getPost('codigo');
        $estado = $this->request->getPost('Estado'); // Corrige el nombre del campo

        // Validar los datos utilizando reglas de validación
        $validationRules = [
            'cedula' => 'required',
            'nombre' => 'required',
            'Area' => 'required', // Ajusta el nombre del campo
            'codigo' => 'required',
            'Estado' => 'required' // Ajusta el nombre del campo
        ];

        if (!$this->validate($validationRules)) {
            // Si la validación falla, redirige con los errores
            return redirect()->to('UsuariosCG')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Crear un array con los datos del empleado
        $data = [
            'cedula' => $cedula,
            'nombre' => $nombre,
            'area' => $area,
            'codigo' => $codigo,
            'estado' => $estado
        ];

        // Imprimir los datos (para depuración)
        print_r($data);

        // Insertar el nuevo empleado en la base de datos
        $empleadoModel = new EmpleadoRegistroModel();
        
        try {
            $empleadoModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', 'Error al insertar en la base de datos: ' . $e->getMessage());
            return redirect()->to('UsuariosCG')->with('error', 'Error al insertar en la base de datos');
        }

        // Redireccionar o mostrar algún mensaje de éxito
        return redirect()->to('UsuariosCG')->with('success', '¡Empleado registrado exitosamente!');
    }
}
