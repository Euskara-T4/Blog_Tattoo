window.onload = iniciar;

function iniciar() {
    document.getElementById("enviar").addEventListener('click', validar, false);
}

function validaNombre() {
    var elemento = document.getElementById("nombre");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error(elemento, "Izena jarri behar duzu.");
            return false;
        }

        if (elemento.validity.patternMismatch) {
            error(elemento, "Izena ezin da izan numerikoa.");
            return false;
        }

        if (elemento.value.length < 2) {
            error(elemento, "Izenaren luzeera 2-20 artean egon behar da.");
            return false;
        }

    }
    return true;
}


function validaApellido() {
    var elemento = document.getElementById("apellido");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error(elemento, "Abizena jarri behar duzu.");
            return false;
        }

        if (elemento.validity.patternMismatch) {
            error(elemento, "Abizena ezin da izan numerikoa.");
            return false;
        }

        if (elemento.value.length < 2) {
            error(elemento, "Abizenaren luzeera 2-30 artean egon behar da.");
            return false;
        }

        return false;
    }
    return true;
}

function validaUsuario() {
    var elemento = document.getElementById("usuario");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error(elemento, "Erabiltzaile izena jarri behar duzu.");
            return false;
        }

        if (elemento.value.length < 5) {
            error(elemento, "Erabiltzaile luzeera 5-20 artean egon behar da.");
            return false;
        }

        return false;
    }

    return true;
}

function validaCorreo() {
    var elemento = document.getElementById("correo");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error(elemento, "Emaila jarri behar duzu.")
        }

        if (elemento.validity.patternMismatch) {
            error(elemento, "Ezin da horrelako emaila izan, example: -------@----.---");
        }

        if (elemento.value.length < 10) {
            error(elemento, "Emailaren luzeera 10-50 artean egon behar da.");
            return false;
        }

        return false;
    }
    return true;
}

function validaContraseña() {
    var elemento = document.getElementById("contraseña");
    var elemento2 = document.getElementById("contraseña2");

    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error(elemento, "Pasahitza jarri behar duzu.")
        }

        if (elemento.value.length < 10) {
            error(elemento, "Pasahitzaren luzeera 10-50 artean egon behar da.");
            return false;
        }

        return false;
    }

    if (!elemento2.checkValidity()) {
        if (elemento2.validity.valueMissing) {
            error(elemento, "Pasahitza jarri behar duzu.")
        }

        if (elemento.value.length < 10) {
            error(elemento, "Pasahitzaren luzeera 10-50 artean egon behar da.");
            return false;
        }

        return false;
    }

    if(elemento.value != elemento2.value){
        error(elemento2, "Pasahiitzak ez dira berdinak!");
        return false;
    }
    
    return true;
}


function validar(e) {
    borrarError();
    if (validaNombre() && validaApellido() && validaUsuario() && validaCorreo() && validaContraseña() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
        return true
    } else {
        e.preventDefault();
        return false;
    }
}


function error(elemento, mensaje) {
    document.getElementById("mensajeError").innerHTML ="** " + mensaje + " **";
    elemento.className = " error";
    elemento.focus();
}

function borrarError() {
    var formulario = document.forms[0];
    for (var i = 0; i < formulario.elements.length; i++) {
        formulario.elements[i].className = "";
    }


}
