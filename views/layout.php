<?php 
if(!isset($_SESSION)){
	session_start();
}	
$auth = isset($_SESSION['login']) ? $_SESSION['login'] : false;
if(!isset($imgHeader)){
    $imgHeader = '';
}    
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="/src/css/normalize.css">
		<!-- GOOGLE FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
	
</head>
<body class="body ">
	<header class="header <?php echo $imgHeader ? 'home' : ""; ?>">
		<div class="container">
			<div class="barra__header">
				<img class="logo__header" src="/src/img/logo.svg">

				<div class="mobile-menu">
					<img src="/src/img/barras.svg" alt="logo-menu-burger">
				</div>
				<div class="derecha">
					<div class="dark-mode">
						<img src="/src/img/dark-mode.svg" alt="btn dark">
					</div>
					<nav class="nav__header">
						<a href="/">Inicio</a>
						<a href="/nosotros">Nosotros</a>
						<a href="/propiedades">Propiedades</a>
						<a href="/blog">Blog</a>
						<a href="/contacto">Contacto</a>
						<a href="/login">Login</a>
						<?php if($auth === true){ ?>
							"<a href="/logout">Cerrar Sesion</a>";
						<?php } ?>
					</nav>
				</div>
			</div>
			<?php if($imgHeader){ ?>
			<div class="title__header">
				<h1>Venta de Casas y Departamentos  Exclusivos de Lujo</h1>
			</div>
			<?php } ?>
		</div>
	</header>

    <?php echo "$contenido" ;?>
    

    <footer class="footer">
		<div class="container">
			<div class="barra__header">
				<nav class="nav__header">
					<a href="/">Inicio</a>
					<a href="/nosotros">Nosotros</a>
					<a href="/propiedades">Propiedades</a>
					<a href="/blog">Blog</a>
					<a href="/contacto">Contacto</a>
				</nav>
			</div>
			<div class="title__header">
				<p>Todos los derechos reservados</p>
			</div>
		</div>
	</footer>
	
	<script src="/src/js/modernizr.js"></script>
	<script src="/src/js/app.js"></script>
</body>
</html>