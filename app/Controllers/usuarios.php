<?php

namespace App\Controllers;
use App\Models\Datosbd_usuarios;

class usuarios extends BaseController
{
    public function index(): string
    {
        return view('CGView/UsuariosRegistrados');
    }
    public function UsuariosCG(): string
    {
        return view('Prueba');
    }



}

    