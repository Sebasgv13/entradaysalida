    <?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::loginCG'); // URL BASE
$routes->POST('/UsuariosCG', 'obtenerTodosLosRegistros::UsuariosCG');
$routes->get('/UsuariosCG', 'obtenerTodosLosRegistros::UsuariosCG');
$routes->POST('/Buscar', 'obtenerTodosLosRegistros::Buscar'); // Ruta para la búsqueda
$routes->POST('/Registros', 'obtenerRegistros::Registros');
$routes->get('/Registros', 'obtenerRegistros::Registros');
$routes->POST('/generarInforme', 'ReportesController::generarInforme');
$routes->POST('/Buscar2', 'obtenerRegistros::Buscar2');
$routes->POST('/Reportes', 'ReportesController::Reportes');
$routes->get('/Reportes', 'ReportesController::Reportes');
$routes->POST('/autenticar', 'LoginController::autenticar');
$routes->get('/Prueba', 'LoginController::loginCG');
$routes->POST('/mostrarFormularioRegistro', 'RegistroController::mostrarFormularioRegistro');
$routes->get('/mostrarFormularioRegistro', 'RegistroController::mostrarFormularioRegistro');
$routes->POST('/registrarUsuario', 'RegistroController::registrarUsuario');
$routes->POST('/Agregar', 'AgregarEmplController::Agregar'); 
$routes->POST('/guardarEmpleado', 'AgregarEmplController::guardarEmpleado');
$routes->POST('/agregarEmpleado', 'AgregarEmplController::agregarEmpleado');
$routes->get('/editar/(:num)', 'obtenerTodosLosRegistros::editar/$1');
$routes->POST('/guardarEdicion', 'obtenerTodosLosRegistros::guardarEdicion');
$routes->POST('/registrarSalida', 'obtenerRegistros::registrarSalida');
$routes->POST('/registrarSalida/(:num)', 'obtenerRegistros::registrarSalida/$1');
$routes->POST('/registrarIngreso/(:num)', 'obtenerRegistros::registrarIngreso/$1');
$routes->POST('/registrarIngreso', 'obtenerRegistros::registrarIngreso');
$routes->POST('/registrarIngresoSalida', 'obtenerRegistros::registrarIngresoSalida');
$routes->get('/PruebaUsuariosCG', 'PruebaUsuariosController::PruebaUsuariosCG');
$routes->POST('/PruebaUsuariosCG', 'PruebaUsuariosController::PruebaUsuariosCG');
$routes->get('/admin', 'LoginController::admin');
$routes->get('/admincg', 'LoginController::admincg');
$routes->get('/mostrarFormulario', 'InfoRegistrosController::mostrarFormulario');
$routes->post('/mostrarFormulario', 'InfoRegistrosController::mostrarFormulario');
$routes->get('/central/mostrarFormulario', 'InfoRegistrosController::mostrarFormulario');
$routes->post('/central/mostrarFormulario', 'InfoRegistrosController::mostrarFormulario');
