<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoRegistro_model extends Model {
    
    public function obtenerRegistrosPorCedulaYFechas($cedula, $fechaInicio, $fechaFin) {
        $fechaInicio = date('Y-m-d H:i:s', strtotime($fechaInicio . ' 00:00:00'));
        $fechaFin = date('Y-m-d H:i:s', strtotime($fechaFin . ' 23:59:59'));

        $query = $this->db->query("
            SELECT 
                [CEDULA],
                [NOMBRE],
                [AREA],
                [CODIGO],
                [FECHA_INGRESO],
                [FECHA_SALIDA],
                [PORTERIA_ENTRAA],
                [PORTERIA_SALIDA]
            FROM [CGingreso].[dbo].[REGISTROS]
            WHERE CEDULA = ? 
                AND FECHA_INGRESO BETWEEN ? AND ?
                AND FECHA_SALIDA IS NOT NULL
        ", [$cedula, $fechaInicio, $fechaFin]);

        return $query->getResult(); // Devuelve los resultados de la consulta
    }
}
