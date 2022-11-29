<main class="main">
		<section class="contacto login">
			<h2 class="title__contacto">Login</h2>

			<form class="form__contacto" action="/login" method="POST">
				<fieldset>
					<?php foreach($errores as $error){ ?>
						<div class="alert-error">
							<?php echo "$error"; ?>
						</div>
					<?php } ?>
				</fieldset>
				<fieldset>
					<legend>Email y Password</legend>
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="Su email" >
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Su password" >
				</fieldset>
				<input type="submit" value="Ingresar" class="submit boton boton--secundario">
			</form>
		</section>
	</main>