<?php
$direccion = $_SERVER["DOCUMENT_ROOT"];

define('TEMPLATE_URL', __DIR__ . "/templates"); 

define('IMAGES_URL', $direccion . "/public/images/");
$images_url = IMAGES_URL;

function incluirTemplate($nombre, $imgHeader = false){
	include TEMPLATE_URL."/${nombre}.php";
}

function estaAutenticado(){
	session_start();
	//$autenticado = $_SESSION['login']; 
	
	if(!($_SESSION['login'])){
		header("Location: /www.cursophp.com/bienesraices_MVC/index.php");
	}
}

function debuguear($variable){
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
	exit;
}

//escapar/sanitizar el HTML
function sanitizar($html){
	$s = htmlspecialchars($html);
	return $s;
}

//limita opciones de eliminar propiedades o vendedores
function validarTipoPost($tipo){
	$tipos = ['propiedad', 'vendedor'];
	return in_array($tipo, $tipos);
}

//muestra los mensajes del crud
function mostrarNotificaciones($alerta){
	$mensaje = 'asd';

	switch($alerta){
		case "1":
			$mensaje = 'Creado correctamente';
			break;
		case "2":
			$mensaje = 'Actualizado correctamente';
			break;
		case "3":
			$mensaje = 'Eliminado correctamente';
			break;
		default:
			$mensaje = false;
			break;
	}

	return $mensaje;
}

function validarIdRedireccionar($url){
	$id = $_GET['id'];
	$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

	if(!$id){
		header("Location: /");
	};
	return $id;
}