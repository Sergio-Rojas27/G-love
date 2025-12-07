const password = document.getElementById("password");
      confpass = document.getElementById("conf-pass");
      icon = document.querySelector(".bx");
      icon1 = document.querySelector(".bx1");

    const imagen = document.getElementById('ojo');
    const imagen1 = document.getElementById('ojo1');
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

icon1.addEventListener("click", e => {   
    if (confpass.type === "password") {
        confpass.type = "text";
        icon1.classList.replace('bx-show-alt', 'bx-hide');
    } 
    else {
        confpass.type = "password";
        icon1.classList.replace("bx-hide", "bx-show-alt");
    }

    // Comprueba la ruta actual y la cambia a la opuesta
    if (imagen1.src.includes('ojoA.png')) {
        imagen1.src = RUTA_APAGADO;
        imagen1.alt = 'Botón Apagado';
    } else {
        imagen1.src = RUTA_ENCENDIDO;
        imagen1.alt = 'Botón Encendido';
    }
})

// 1. Obtener los elementos HTML
const inputArchivo = document.getElementById('cedula');
const displayNombre = document.getElementById('file-name-display');

// 2. Escuchar el evento 'change' (cuando se selecciona un archivo)
inputArchivo.addEventListener('change', function() {
    
    // El objeto 'files' contiene una lista de los archivos seleccionados.
    // Aunque solo se selecciona uno, siempre es una lista.
    if (this.files && this.files.length > 0) {
        
        // Obtenemos el nombre del primer archivo (índice 0)
        const nombreDelArchivo = this.files[0].name;
        
        // 3. Actualizar el contenido del span
        displayNombre.textContent = nombreDelArchivo;
        
    } else {
        // Si el usuario cancela la selección, revertimos el texto
        displayNombre.textContent = 'Ningún archivo seleccionado.';
    }
});


// no funciono, despues veo porque
const checkbox = document.getElementById('mundo');
const inputText = document.getElementById('distancia');

checkbox.addEventListener('change', function() {
  if (checkbox.checked) {
    inputText.readOnly = true; 
    inputText.value = ''; 
  } else {
    inputText.readOnly = false;
  }
});

// no funciono, despues veo porque