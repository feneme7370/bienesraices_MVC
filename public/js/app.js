document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('darkBody');
    } else {
        document.body.classList.remove('darkBody');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('darkBody');
        } else {
            document.body.classList.remove('darkBody');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('darkBody');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //muestra campos condicionales del formulario contacto
    const metodoContacto = document.querySelectorAll('.js-radio');
    //metodoContacto.addEventListener('click', mostrarMetodosContacto);

    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.nav__header');

    navegacion.classList.toggle('mostrar')
}

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
    console.log(e);
    
}