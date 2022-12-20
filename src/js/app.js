document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
});

/* ================================================ DARK MODE ================================================ */
function darkMode() {
    //ver preferencia del darkmode del dispositivo
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches) {
        document.body.classList.add('darkBody');
    } else {
        document.body.classList.remove('darkBody');
    }

    //cambiar en tiempo real si cambia desde el dispositio
    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('darkBody');
        } else {
            document.body.classList.remove('darkBody');
        }
    });

    //boton para cambiar manualmente darkMode
    const botonDarkMode = document.querySelector('.dark-mode');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('darkBody');
    });
}
/* ================================================ BOTON DESPLAZAR MENU EN MOBIL ================================================ */
/* ================================================ MENU OPCIONAL OCULTO EN FORM ================================================ */
function eventListeners() {
    //boton para hacer click
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    //muestra campos condicionales del formulario contacto
    const metodoContacto = document.querySelectorAll('.js-radio');
    //metodoContacto.addEventListener('click', mostrarMetodosContacto);
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));

}

/* ================================================ TOGGLE PARA MOSTRAR MENU MOBIL ================================================ */
function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar')
}

/* ================================================ CREAR HTML DE MENU OCULTO ================================================ */
function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contactoDiv');
    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <label for="telefono">Numero de Telefono</label>
            <input type="number" id="telefono" placeholder="Su telefono" name="contacto[telefono]" required>
            <p>Diganos en que momento lo podemos contactar</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">
            <label for="hora">Hora</label>
            <input type="time" name="contacto[hora]">
        `
    }else if (e.target.value === 'email'){
        contactoDiv.innerHTML = `
        <label for="email">*Email</label>
        <input type="email" id="email" placeholder="Su email" name="contacto[email]" required>
        `
    }else{
        contactoDiv.textContent = 'no elegiste nada';
    }
    //console.log(e);
}