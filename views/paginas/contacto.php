	<main class="main">
		<section class="contacto container">
			<h2 class="title__contacto">Contacto</h2>

			<?php 
			if($mensaje){
				echo "<p class='alert-exito'>" . $mensaje . "</p>";
			}
			 ;?>

			<picture class="img__contacto">
				<img src="src/img/destacada3.jpg">
			</picture>
			<h3 class="subtitle__contacto">Llene el formulario para contactarnos</h3>
			<form class="form__contacto" action="/contacto" method="POST">
				<fieldset>
					<legend>Informacion personal</legend>
					
					<label for="nombre">*Nombre</label>
					<input type="text" id="nombre" placeholder="Su nombre" name="contacto[nombre]" required>
					
					<!-- <label for="email">*Email</label>
					<input type="email" id="email" placeholder="Su email" name="contacto[email]" required> -->
					
					<!-- <label for="telefono">Telefono</label>
					<input type="number" id="telefono" placeholder="Su telefono" name="contacto[telefono]"> -->
					
					<label for="mensaje">*Mensaje</label>
					<textarea id="mensaje" placeholder="Su mensaje" name="contacto[mensaje]" required></textarea>

				</fieldset>
				<fieldset>
					<legend>Informacion sobre la propiedad</legend>
					
					<label for="operacion">Compra o vende</label>
					<select id="operacion" name="contacto[operacion]" required>
						<option selected disabled value="">Seleccionar opcion</option>
						<option value="compra">Compra</option>
						<option value="venta">Venta</option>
					</select>
					
					<label for="presupuesto">Presupuesto</label>
					<input type="number" id="presupuesto" placeholder="Su presupuesto o precio" name="contacto[presupuesto]" required>
				</fieldset>
				<fieldset>
					<legend>Informacion sobre contacto</legend>
					<p>Como desea ser contactado</p>
					<div class="forma-contacto">
						
						<label for="contacto-telefono">Telefono</label>
						<input type="radio" id="contacto-telefono" value="telefono" name="contacto[contacto]" class="js-radio" required>
						
						<label for="contacto-email">Email</label>
						<input type="radio" id="contacto-email" value="email" name="contacto[contacto]" class="js-radio" required>
					</div>
					<div id="contactoDiv">

					</div>
					<!-- <p>Si eligio telefono, diganos en que momento lo podemos contactar</p>
					<label for="fecha">Fecha</label>
					<input type="date" id="fecha" name="contacto[fecha]">
					<label for="hora">Hora</label>
					<input type="time" name="contacto[hora]"> -->
				</fieldset>
				<input class="boton boton--secundario" value="Enviar" type="submit">
			</form>
		</section>
	</main>