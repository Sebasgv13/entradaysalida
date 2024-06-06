<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class InformeModel extends Model {
    
    public function buscarInforme($cedula,$area, $fechainicio, $fechafinal) {
        // Procesar y validar fechas si es necesario
        $fechainicio = date('Y-m-d H:i:s', strtotime($fechainicio . ' 00:00:00'));
        $fechafinal = date('Y-m-d H:i:s', strtotime($fechafinal . ' 23:59:59'));

        $query = $this->db->query("
            -- Llamada a tu función SQL con el formato correcto
            SELECT * FROM BUSCAR_INFORME ('$cedula', '$area', '$fechainicio', '$fechafinal')
        ");

      
        
        return $query->getResult(); // Devuelve los resultados de la consulta
    }
}

 
?>
