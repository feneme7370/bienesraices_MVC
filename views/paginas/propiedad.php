
	<main class="main">
		<div class="anuncio container">
			<div class="product">
				<h3 class="title__product"><?php echo $propiedad->titulo;?></h3>
				<p class="p__product"><?php echo $propiedad->descripcion;?></p>
				<img src="/images/<?php echo $propiedad->imagen;?>" class="img__product">
				<div class="info_product container">
					<p class="price__product">$<?php echo $propiedad->precio;?></p>
					<div class="icons__store">
						<div class="icon_store">
							<img src="/img/icono_dormitorio.svg">
							<p><?php echo $propiedad->habitaciones;?></p>
						</div>
						<div class="icon_store">
							<img src="/img/icono_wc.svg">
							<p><?php echo $propiedad->wc;?></p>
						</div>
						<div class="icon_store">
							<img src="/img/icono_estacionamiento.svg">
							<p><?php echo $propiedad->estacionamiento;?></p>
						</div>
					</div> <!--..icons_store-->
					<p>Proin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet molestie. Proin tristique commodo felis, sed auctor elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin, arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi. Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor. Suspendisse lobortis dolor quis elit suscipit molestie. Sed condimentum, erat at tempor finibus, urna nisi fermentum est, a dignissim nisi libero vel est. Donec et imperdiet augue. Curabitur malesuada sodales congue. Suspendisse potenti. Ut sit amet convallis nisi.</p> 
					<p>Aliquam lectus magna, luctus vel gravida nec, iaculis ut augue. Praesent ac enim lorem. Quisque ac dignissim sem, non condimentum orci. Morbi a iaculis neque, ac euismod felis. Fusce augue quam, fermentum sed turpis nec, hendrerit dapibus ante. Cras mattis laoreet nibh, quis tincidunt odio fermentum vel. Nulla facilisi.</p>
					<a class="boton boton--secundario" href="/contacto">Contactar por propiedad</a>
				</div> <!--..info__product-->
			</div> <!--..product-->
		</div>
	</main>
