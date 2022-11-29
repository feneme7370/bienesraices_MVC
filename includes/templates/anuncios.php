<?php


use Feneme\Propiedad;

if($_SERVER['SCRIPT_NAME'] === "/www.cursophp.com/bienesraices_propio/anuncios.php"){
	$propiedades = Propiedad::all();
}else{
	$propiedades = Propiedad::get(3);
}
?>

<div class="products">
<?php foreach($propiedades as $propiedad){?>
	<div class="product">
		<img src="images/<?php echo $propiedad->imagen;?>" class="img__product">
		<div class="info_product container">
			<h3 class="title__product"><?php echo $propiedad->titulo;?></h3>
			<p class="p__product"><?php echo $propiedad->descripcion;?></p>
			<p class="price__product">$<?php echo $propiedad->precio;?></p>
			<div class="icons__store">
				<div class="icon_store">
					<img src="src/img/icono_dormitorio.svg">
					<p><?php echo $propiedad->habitaciones;?></p>
				</div>
				<div class="icon_store">
					<img src="src/img/icono_wc.svg">
					<p><?php echo $propiedad->wc;?></p>
				</div>
				<div class="icon_store">
					<img src="src/img/icono_estacionamiento.svg">
					<p><?php echo $propiedad->estacionamiento;?></p>
				</div>
			</div> <!--..icons_store-->
			<a class="boton boton--primario" href="anuncio.php?id=<?php echo $propiedad->id;?>">Ver Propiedad</a>
		</div> <!--..info__product-->
	</div> <!--..product-->
	<?php } ?>
</div> <!--..products-->
