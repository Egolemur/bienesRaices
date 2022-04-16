document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkmode();
})

function darkmode() {
    const prefiereDarkMode =window.matchMedia('(prefers-color-scheme: dark');

    if(prefiereDarkMode.matches) {
        document.body.classList.add('activado');
    } else {
        document.body.classList.remove('activado');
    }

    prefiereDarkMode.addEventListener('change', function() {
        document.body.classList.toggle('activado');
    })

    const darkmode = document.querySelector('.darkmode');

    darkmode.addEventListener('click', function() {
        document.body.classList.toggle('activado');
    })
}

function eventListeners() {    
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

