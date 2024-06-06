<?php
namespace App\Models;

use CodeIgniter\Model;

class Datosbd_models extends Model {
    protected $table = 'empleados'; // Nombre de tu tabla

    public function obtenerDiezPrimerosRegistros() {
        return $this->findAll(10); // Esto obtendrá los primeros 10 registros
    }
    
    
    
    public function buscarRegistros($query) {
        // Verificar si $query es null o vacío
        if ($query !== null && $query !== '') {
            // Ejemplo: búsqueda básica utilizando LIKE en múltiples campos
            return $this->db->table('empleados')
                ->groupStart()
                    ->like('CEDULA', $query)
                    ->orLike('NOMBRE', $query)
                    ->orLike('AREA', $query)
                    ->orLike('CODIGO', $query)
                    ->orLike('ESTADO', $query)
                ->groupEnd()
                ->get()
                ->getResultArray();
        } else {
            // Si $query es null o vacío, podrías retornar un array vacío o manejarlo según tu lógica
            return [];
        }
    }
    public function obtenerEmpleadoPorCedula($cedula) {
        return $this->where('CEDULA', $cedula)->first();
    }
    public function actualizarEmpleado($cedula, $nombre, $area, $codigo, $estado) {
        // Lógica para actualizar los datos del empleado en la base de datos
        // Utiliza el método update() u otro método según la lógica de tu aplicación
        $data = [
            'NOMBRE' => $nombre,
            'AREA' => $area,
            'CODIGO' => $codigo,
            'ESTADO' => $estado,
            // Agrega otros campos según tu estructura de base de datos
        ];

        $this->db->table('empleados')->where('CEDULA', $cedula)->update($data);
    }    
      
    
}

?>
