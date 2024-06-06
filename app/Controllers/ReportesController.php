<?php
namespace App\Controllers;

use App\Models\InformeModel;

class ReportesController extends BaseController {
    public function Reportes() {
        return view('CGView/Reportes'); // Cargar el formulario para ingresar los datos
    }
    
    public function generarInforme() {
        // Obtener los datos del formulario
        $cedula = $this->request->getPost('Cedula');
        $area = $this->request->getPost('Area');
        $fechainicio = date('Y-m-d', strtotime($this->request->getPost('fechainicio')));
$fechafinal = date('Y-m-d', strtotime($this->request->getPost('fechafinal')));


    
        // Verificar si se han proporcionado fechas
        if ($fechainicio && $fechafinal) {
            // Si se han proporcionado fechas, proceder con el proceso del informe
            $InformeModel = new InformeModel();
            $resultado = $InformeModel->buscarInforme($cedula, $area,$fechainicio, $fechafinal);
    
          

            // Pasar los resultados a la vista
            $data['resultados'] = $resultado;

            return view('CGView/Reportes', $data); // Mostrar los resultados
        } else {
            // Si no se han proporcionado fechas, regresar al formulario con un mensaje de error
            return redirect()->to('/central/Reportes')->with('error', 'Debes proporcionar fechas válidas.');
        }
    
    
    

    
    }
   
}



?>
