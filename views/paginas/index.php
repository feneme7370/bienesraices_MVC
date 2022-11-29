<main class="main">
		<section class="info container">
			<h2 class="title__info">Más Sobre Nosotros</h2>
			<div class="icons">
				<div class="icon">
					<img src="src/img/icono1.svg" class="icon__icon">
					<h3 class="title__icon">Seguridad</h3>
					<p class="p__icon">Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem.</p>
				</div>
				<div class="icon">
					<img src="src/img/icono2.svg" class="icon__icon">
					<h3 class="title__icon">Precio</h3>
					<p class="p__icon">Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem.</p>
				</div>
				<div class="icon">
					<img src="src/img/icono3.svg" class="icon__icon">
					<h3 class="title__icon">Tiempo</h3>
					<p class="p__icon">Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem.</p>
				</div>
			</div>
		</section>
		<section class="store container">
			<h2 class="title__store">Casas en venta y Deptos</h2>

			
			<?php
			$limite = 3;
			include "listado.php";
			?>
			
			<a href="/propiedades" class="boton boton--secundario">Ver Todas</a>
		</section>
		<section class="contactar">
			<h2 class="title__contactar">Encuentra la casa de tus sueños</h2>
			<p class="p__contactar">Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
			<a class="boton boton--primario">Contactar</a>
		</section>
		<section class="comentarios container">
			<div class="blogs">
				<h2>Nuestro Blog</h2>
				<div class="entradas">
					<div class="entrada">
						<a href="entrada.html">
							<picture class="img__entrada">
								<img src="src/img/blog1.jpg">
							</picture>
						</a>
						<div  class="info__entrada">
							<h3 class="title__entrada">Terraza en el techo de tu casa</h3>
							<p class="fecha__entrada">Escrito el:<span>20/20/2022</span> por:<span>Admin</span></p>
							<p class="p__entrada">Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
						</div>
					</div><!--..entrada-->
					<div class="entrada">
						<a href="entrada.html">
							<picture class="img__entrada">
								<img src="src/img/blog2.jpg">
							</picture>
						</a>
						<div href="entrada.html" class="info__entrada">
							<h3 class="title__entrada">Terraza en el techo de tu casa</h3>
							<p class="fecha__entrada">Escrito el:<span>20/20/2022</span> por:<span>Admin</span></p>
							<p class="p__entrada">Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
						</div>
					</div><!--..entrada-->
				</div><!--..entradas-->
			</div>
			<div class="testimoniales">
				<h2 class="title__testimoniales">Testimoniales</h2>
				<div class="info__testimoniales">
					<blockquote class="p__testimoniales">
						<p>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.</p>
					</blockquote>
					<p class="autor__testimoniales">- Juan De la torre</p>
				</div>
			</div>
		</section>
	</main>