<main class="container contacto">
        <h1>Registrar vendedor</h1>
		<a class="boton boton-verde" href="/admin">Volver</a>
		
		<?php foreach($errores as $error){ ?>
			<div class="alert-error">
				<?php echo "$error"; ?>
			</div>
		<?php } ?>
		
		<form class="form__contacto" action="/vendedores/crear" method="POST" enctype="multipart/form-data">

			<?php include "formulario.php"; ?>
			<div class="submit-contenedor">
				<input type="submit" value="Cargar vendedor" class="submit boton boton--secundario">
			</div>
		</form>
    </main>