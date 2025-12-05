const password = document.getElementById("password");
      icon = document.querySelector(".bx");

    const imagen = document.getElementById('ojo');
    const RUTA_ENCENDIDO = 'media/ojoA.png';
    const RUTA_APAGADO = 'media/ojoC.png';

icon.addEventListener("click", e => {   
    if (password.type === "password") {
        password.type = "text";
        icon.classList.replace('bx-show-alt', 'bx-hide');
    } 
    else {
        password.type = "password";
        icon.classList.replace("bx-hide", "bx-show-alt");
    }

    // Comprueba la ruta actual y la cambia a la opuesta
    if (imagen.src.includes('ojoA.png')) {
        imagen.src = RUTA_APAGADO;
        imagen.alt = 'Botón Apagado';
    } else {
        imagen.src = RUTA_ENCENDIDO;
        imagen.alt = 'Botón Encendido';
    }
})