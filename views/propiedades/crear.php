<main class="container contacto">
    <h1>Crear</h1>

    <a class="boton boton-verde" href="/admin">Volver</a>
    
    <?php foreach($errores as $error){ ?>
        <div class="alert-error">
            <?php echo "$error"; ?>
        </div>
    <?php }; ?>

    <!--<a class="boton boton-verde" href="/admin">Volver</a> -->
    <form class="form__contacto" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php' ;?>
        <input type="submit" value="Registrar Propiedad" class="submit boton boton--secundario">
    </form>
    

</main>