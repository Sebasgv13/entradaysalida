<?php

namespace App\Controllers;

class TestController extends BaseController
{
    public function UsuariosRegistrados1()
    {
        // Cargar la base de datos
        $db = \Config\Database::connect();

        // Verificar la conexión
        if ($db->connect(false)) {
            // Mensaje de éxito
            session()->setFlashdata('success', 'Conexión exitosa a la base de datos.');
        } else {
            $error = $db->error();
            // Mensaje de error
            session()->setFlashdata('error_login', 'Error al conectar a la base de datos: ' . $error['message']);
        }

        // Cargar la vista con los mensajes flash
        return view('CGView/UsuariosRegistrados');
    }
}

