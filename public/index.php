<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
// use Models\ActiveRecord;
// use Models\Propiedad;
use Models\Vendedor;

$router = new Router();


//PropiedadController::class da el namespace de la clase ej MVC

//cuando esta en admin, va a buscar en la clase PropiedadController el metodo index
//$router->get('/admin', [PropiedadController::class, 'index']);

$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
//$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
//$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
//$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->get('/vendedores/eliminar', [VendedorController::class, 'eliminar']);
//$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->comprobarRutas();

?>
