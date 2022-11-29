<fieldset>
    <legend>Información Personal</legend>

    <label for="nombre">Nombre</label>
    <input type="text" placeholder="Ingresar nombre" name="vendedor[nombre]" id="nombre" value="<?php echo sanitizar($vendedor->nombre); ?>">

    <label for="apellido">Apellido</label>
    <input type="text" placeholder="Ingresar apellido" name="vendedor[apellido]" id="apellido"  value="<?php echo sanitizar($vendedor->apellido); ?>">

    
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Telefono</label>
    <input type="number" placeholder="Ingresar telefono" name="vendedor[telefono]" id="telefono" value="<?php echo sanitizar($vendedor->telefono); ?>">

</fieldset>