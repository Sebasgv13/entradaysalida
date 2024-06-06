<?php

namespace App\Controllers;

use App\Models\InfoRegistro_model;

class InfoRegistrosController extends BaseController
{
    private $infoRegistroModel;

    public function __construct()
    {
        $this->infoRegistroModel = new InfoRegistro_model();
    }

    public function mostrarFormulario()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {
            $cedula = $this->request->getPost('cedula');
            $fechaInicio = $this->request->getPost('fecha_inicio');
            $fechaFin = $this->request->getPost('fecha_fin');

            $data['registros'] = $this->infoRegistroModel->obtenerRegistrosPorCedulaYFechas($cedula, $fechaInicio, $fechaFin);
        }

        return view('CGView/InfoRegistros', $data);
    }
}
