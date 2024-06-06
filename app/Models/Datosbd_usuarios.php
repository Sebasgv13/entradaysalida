<?php
namespace App\Models;

use CodeIgniter\Model;

class Datosbd_usuarios extends Model {
    protected $table = 'REGISTROS'; // Nombre de tu tabla

    public function obtenerDiezPrimerosRegistros() {
        return $this->where('FECHA_INGRESO IS NOT NULL', NULL, FALSE)
                ->where('FECHA_SALIDA IS NULL')
                ->findAll(10); // Esto obtendrá los primeros 10 registros
    }
    
    public function buscarRegistros($query) {
        if ($query !== null && $query !== '') {
            $builder = $this->db->table('empleados');
            $builder->select('empleados.CODIGO, empleados.NOMBRE, empleados.AREA, REGISTROS.ID_INGRESO, REGISTROS.FECHA_INGRESO, REGISTROS.FECHA_SALIDA');
            $builder->join('REGISTROS', 'empleados.CODIGO = REGISTROS.CODIGO', 'left');
            $builder->like('empleados.CODIGO', $query);
            $builder->groupStart();
            $builder->where('COALESCE(REGISTROS.FECHA_SALIDA, 1) = 1', NULL, FALSE);
            $builder->orGroupStart();
            $builder->where('(REGISTROS.FECHA_INGRESO IS NULL AND REGISTROS.FECHA_SALIDA IS NULL)', NULL, FALSE);
            $builder->orWhere('(REGISTROS.FECHA_INGRESO IS NOT NULL AND REGISTROS.FECHA_SALIDA IS NULL)');
            $builder->groupEnd();
            $builder->groupEnd();
    
            //$builder->orderBy('REGISTROS.FECHA_SALIDA', 'ASC'); // Ordenar por fecha de salida ascendente
            $builder->limit(1); // Obtener solo un registro
    
            $result = $builder->get()->getRowArray();
    
          
    
            if (!$result) {
                // Si no se encuentra un registro en REGISTROS, buscar en empleados
                $builder = $this->db->table('empleados');
                $builder->select('empleados.CODIGO, empleados.NOMBRE, empleados.AREA, NULL as ID_INGRESO, NULL as FECHA_INGRESO, NULL as FECHA_SALIDA');
                $builder->where('empleados.CODIGO', $query);
                $builder->where('empleados.ESTADO !=', 'retirado'); // Excluir empleados con estado "retirado"
                $result = $builder->get()->getRowArray();
            }
    
            if ($result !== null) {
                return [$result];
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
    
    
    
    
    
    
    
    public function obtenerAreaPorCodigo($codigo) {
        $builder = $this->db->table('empleados');
        $builder->select('AREA');
        $builder->where('CODIGO', $codigo);
        $result = $builder->get()->getRow();

        if ($result) {
            return $result->AREA;
        } else {
            return null; // O devuelve un valor predeterminado según tu lógica
        }
    }

    public function guardarIngreso($codigo, $area, $nusuario) {
        $this->db->query("EXEC REGISTRO_INGRESOS @codigo = ?, @area = ?, @usuario = ?", [$codigo, $area, $nusuario]);
    }

    public function guardarSalida($codigo, $area,$nusuario) {
        $this->db->query("EXEC REGISTRO_SALIDA @codigo = ?, @area = ?, @usuario = ?", [$codigo, $area, $nusuario]);
    }
    
}    
?>
