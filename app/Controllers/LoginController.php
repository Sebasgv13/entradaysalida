<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class LoginController extends Controller
{
    protected $UsuarioModel;

    public function __construct()
    {
        $this->UsuarioModel = new UsuarioModel();
    }

    public function loginCG()
    {
        return view('CGView/loginCG');
    }

    public function admin()
    {
        return view('CGView/SuperAdminView');
    }
    public function admincg()
    {
        return view('CGView/admin-cg');
    }

    public function autenticar()
    {
        $request = $this->request;
        $nusuario = $request->getPost('username');
        $contrasena = trim($request->getPost('password'));

        // Obtener información del usuario
        $datosUsuario = $this->UsuarioModel->obtenerUsuario(['NUSUARIO' => $nusuario]);

        // Imprimir información de depuración en el registro
        $this->logger->info('Antes de obtener información del usuario para: ' . $nusuario);

        if ($datosUsuario) {
            // Imprimir la contraseña almacenada solo para propósitos de depuración
            log_message('info', 'Contraseña almacenada para el usuario "' . $nusuario . '": ' . $datosUsuario['CONTRASENA']);
            log_message('info', 'Contraseña ingresada: ' . $contrasena);

            // Verificar la contraseña
            if (trim($contrasena) === trim($datosUsuario['CONTRASENA'])) {
                $this->logger->info('Contraseña verificada con éxito.');

                // Crear array de datos para la sesión
                $data = [
                    "usuario" => $datosUsuario['NUSUARIO'],
                    "type" => $datosUsuario['TIPO_USUARIO']
                ];

                // Iniciar la sesión con los datos del usuario
                $session = session();
                $session->set($data);

                // Redireccionar según el tipo de usuario
                switch ($datosUsuario['TIPO_USUARIO']) {
                    case 1:
                        return redirect()->to('Registros');
                    case 2:
                        return redirect()->to('UsuariosCG');
                    case 3:
                        return redirect()->to('Reportes');
                    case 4:
                        return redirect()->to('admin');
                        case 5:
                            return redirect()->to('admincg');
                    default:
                        return redirect()->to('error');
                }
            } else {
                // Si no se autentica, mostrar mensaje de error
                $this->logger->error('Autenticación fallida para el usuario: ' . $nusuario);
                return view('CGView/loginCG', ['error_login' => 'Usuario o contraseña incorrectos']);
            }
        } else {
            // Usuario no encontrado en la base de datos
            $this->logger->error('Usuario no encontrado en la base de datos para: ' . $nusuario);
            return view('CGView/loginCG', ['error_login' => 'Usuario o contraseña incorrectos']);
        }
    }
}
