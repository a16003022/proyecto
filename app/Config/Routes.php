<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//ruta - clase - metodo
$routes->add('/articulos', 'articulos::mensaje');
$routes->add('inicio', 'Inicio::index');

$routes->add('registro', 'RegUsuario::index');
$routes->get('RegUsuario', 'RegUsuario::index');
$routes->post('RegUsuario', 'RegUsuario::register');

$routes->add('login', 'Login::index');
$routes->get('registrarPaquete', 'RegPaquete::index', ['filter' => 'authFilter']);
$routes->add('editarPaquete/(:num)', 'RegPaquete::index/$1', ['filter' => 'authFilter']);
$routes->add('eliminarPaquete/(:num)', 'RegPaquete::eliminar_paquete/$1', ['filter' => 'authFilter']);
$routes->post('/guardar_paquete', 'RegPaquete::guardar_paquete', ['filter' => 'authFilter']);
$routes->get('registrarProducto', 'RegProducto::index', ['filter' => 'authFilter']);
$routes->add('editarProducto/(:num)', 'RegProducto::index/$1', ['filter' => 'authFilter']);
$routes->add('eliminarProducto/(:num)', 'RegProducto::eliminar_producto/$1', ['filter' => 'authFilter']);
$routes->post('/guardar_producto', 'RegProducto::guardar_producto', ['filter' => 'authFilter']);
$routes->get('/añadirProductos/(:num)', 'AñaProductos::index/$1', ['as' => 'añadir_productos']);
$routes->post('/relacionarProd/(:num)', 'AñaProductos::relacionarProd/$1', ['as' => 'añadir_productos']);
$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);
$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
$routes->get('/usuarios', 'Usuarios::index', ['filter' => 'authFilter']);
$routes->get('/administrador', 'Administrador::index');/* ['filter' => 'authFilter']);*/
$routes->get('/carrito', 'VerCarrito::index', ['filter' => 'authFilter']);
$routes->get('/catalogoPlayeras', 'Catalogo::Playeras');
$routes->get('/catalogoSudaderas', 'Catalogo::Sudaderas');
$routes->get('/catalogoBolsas', 'Catalogo::Bolsas');
$routes->post('/catalogoPlayeras', 'Catalogo::guardar_contenido');
$routes->post('/eliminarProducto', 'VerCarrito::eliminarProducto');
$routes->post('/procesarCarrito', 'VerCarrito::procesarCarrito'); /* solo procesa el carrito, no muestra una vista*/
$routes->get('/lista', 'verListas::index', ['filter' => 'authFilter']);
$routes->post('/crearLista', 'verListas::crearLista');
$routes->post('/agregarLista', 'verListas::AgregarALista');
$routes->post('/eliminarProductoLista', 'verListas::EliminarProductoLista');
$routes->post('/lista', 'verListas::EliminarLista');
$routes->get('revisarInventario', 'Inventariado::index', ['filter' => 'authFilter']);
$routes->post('/actualizarInventario', 'Inventariado::actualizarInventario');

$routes->get('/pagos', 'Pago::index', ['filter' => 'authFilter']);
$routes->post('/registrardireccion', 'Pago::guardarDireccion', ['filter' => 'authFilter']);
$routes->post('/eliminarDireccion', 'Pago::BorrarDireccion', ['filter' => 'authFilter']);
$routes->post('/registrarventa', 'Pago::RegistrarVenta', ['filter' => 'authFilter']);
$routes->post('/registrarventa', 'Pago::RegistrarDetalleVenta', ['filter' => 'authFilter']);
$routes->get('/ticket', 'Pago::Ticket', ['filter' => 'authFilter']);
$routes->get('/ticket/(:num)', 'Pago::imprimirTicket/$1');
$routes->get('/enviarEmail', 'Pago::Email', ['filter' => 'authFilter']);
$routes->post('/registrartarjeta', 'Pago::guardarTarjeta', ['filter' => 'authFilter']);

$routes->get('/recuperarcontraseña', 'Login::RecuperarContraseña');
$routes->post('/recuperarcontraseña', 'Login::RecuperarContraseña');

$routes->get('/recuperar/(:num)/(:any)', 'Login::Recuperar/$1/$2');
$routes->post('/recuperarcontra', 'Login::Recuperar');
$routes->get('/recuperarcontra', 'Login::index');
$routes->post('/aplicarcupon', 'VerCarrito::AplicarCupon', ['filter' => 'authFilter']);

$routes->get('/gestionarClientes', 'Clientes::index', ['filter' => 'authFilter']);

$routes->get('/buscar', 'Buscador::buscar');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
?>