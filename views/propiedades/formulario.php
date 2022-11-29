			<fieldset>
                <legend>Información Personal</legend>

                <label for="titulo">Titulo</label>
                <input type="text" placeholder="Ingresar titulo" name="propiedad[titulo]" id="titulo" value="<?php echo sanitizar($propiedad->titulo); ?>">

                <label for="precio">Precio</label>
                <input type="number" placeholder="El precio" name="propiedad[precio]" id="precio"  value="<?php echo sanitizar($propiedad->precio); ?>" min="1">

                <label for="imagen">Imagen</label>
                <input type="file" placeholder="Cargar imagen" name="propiedad[imagen]" id="imagen" accept="image/jpg, image/jpeg, image/png">

                <?php if($propiedad->imagen){ ?>
                    <img class ="imagen-table" src="/public/images/<?php echo $propiedad->imagen; ?>">
                <?php } ?>

                <label for="descripcion">Descripcion:</label>
                <textarea name="propiedad[descripcion]" id="descripcion"><?php echo sanitizar($propiedad->descripcion); ?></textarea>
            </fieldset>
			<fieldset>
                <legend>Información Propiedad</legend>

                <label for="wc">Baños</label>
                <input type="number" placeholder="Tu Nombre" name="propiedad[wc]" id="wc" value="<?php echo sanitizar($propiedad->wc); ?>" min="1">

                <label for="estacionamiento">estacionamiento</label>
                <input type="number" placeholder="Tu Nombre" name="propiedad[estacionamiento]" id="estacionamiento" value="<?php echo sanitizar($propiedad->estacionamiento); ?>" min="1">
				
				<label for="habitaciones">Habitaciones</label>
                <input type="number" placeholder="Tu Nombre" name="propiedad[habitaciones]" id="habitaciones" value="<?php echo sanitizar($propiedad->habitaciones); ?>" min="1">

            </fieldset>
			<fieldset>
                <legend>Información Vendedor</legend>
                
                <label for="vendedor">Vendedor</label>
                <select name="propiedad[vendedorId]" id="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php foreach($vendedores as $vendedor){ ?>
                        <option 
                        <?php echo $propiedad->vendedorId === $vendedor->id ? "selected" : "" ; ?>
                        value="<?php echo sanitizar($vendedor->id)?>"> <?php echo sanitizar($vendedor->apellido) . ", " . sanitizar($vendedor->nombre); ?> </option>
                    <?php } ?>

                </select>

            </fieldset>