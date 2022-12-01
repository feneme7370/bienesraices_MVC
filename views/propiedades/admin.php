<main class="container">
        <h1>Administracion</h1>
		<?php 
        if($alerta){
            $mensaje = mostrarNotificaciones($alerta);

            if($mensaje){ ?>
                <p class="alert-exito"><?php echo sanitizar($mensaje) ;?>
                </p>
            <?php }; ?>
        <?php }; ?>
		
		<a class="boton boton--secundario" href="/propiedades/crear">Nueva propiedad</a>
		<a class="boton boton--secundario" href="/vendedores/crear">Nuevo vendedor</a>
		
		<h2>Propiedades</h2>	

		<table class="table propiedades">
			<thead>
				<tr>
					<th>Id</th>
					<th>Titulo</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($propiedades as $propiedad){ ?>
				<tr>
					<td><?php echo $propiedad->id ?></td>
					<td><?php echo $propiedad->titulo ?></td>
					<td><img class="imagen-table" src="/images/<?php echo $propiedad->imagen ?>"></td>
					<td><?php echo $propiedad->precio ?></td>
					<td>
						<form method="POST" action="/propiedades/eliminar">
							<input type="hidden" value="<?php echo $propiedad->id ?>" name="id" class="boton boton--error">
							<input type="hidden" value="propiedad" name="tipo" class="boton boton--error">
							<input type="submit" value="Eliminar" class="boton boton--error">
						</form>
						<a href="propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton boton--exito">Actualizar</a>
					</td>
				</tr>
				<?php } ?>
				<!-- cerrar conexion -->
				<?php //mysqli_close($db); ?>
			</tbody>
		</table>

		<h2>Vendedores</h2>

		<table class="table propiedades">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($vendedores as $vendedor){ ?>
				<tr>
					<td><?php echo $vendedor->id ?></td>
					<td><?php echo $vendedor->apellido . ", " . $vendedor->nombre ?></td>
					<td><?php echo $vendedor->telefono ?></td>
					<td>
						<form method="POST" action="/vendedores/eliminar">
							<input type="hidden" value="<?php echo $vendedor->id ?>" name="id" class="boton boton--error">
							<input type="hidden" value="vendedor" name="tipo" class="boton boton--error">
							<input type="submit" value="Eliminar" class="boton boton--error">
						</form>
						<a href="vendedores/actualizar?id=<?php echo $vendedor->id ?>" class="boton boton--exito">Actualizar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

    </main>