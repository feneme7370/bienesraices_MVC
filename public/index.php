<?php 
require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

//variable de mensaje en admin
$alerta = isset($_GET['m']) ? "?m=${_GET['m']}" : '';
$id = isset($_GET['id']) ? "?id=${_GET['id']}" : '';



//PropiedadController::class da el namespace de la clase ej MVC

//cuando esta en admin, va a buscar en la clase PropiedadController el metodo index
//ZONA PRIVADA
$router->get("/admin${alerta}", [PropiedadController::class, 'index']);

$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get("/propiedades/actualizar${id}", [PropiedadController::class, 'actualizar']);
$router->post("/propiedades/actualizar${id}", [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get("/vendedores/actualizar${id}", [VendedorController::class, 'actualizar']);
$router->post("/vendedores/actualizar${id}", [VendedorController::class, 'actualizar']);
$router->get('/vendedores/eliminar', [VendedorController::class, 'eliminar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

//ZONA PUBLICA
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get("/propiedad${id}", [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get("/entrada${id}", [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

//login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();

?>
