<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID_USUARIO'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'NOMBRE'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'NUSUARIO'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'CONTRASENA'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'TIPO_USUARIO' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('ID_USUARIO', true);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
