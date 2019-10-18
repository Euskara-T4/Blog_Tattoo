window.onload = iniciar;

function iniciar() {
    document.getElementById("enviar").addEventListener('click', validar, false);
}

function validaNombre() {
    var elemento = document.getElementById("nombre");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Izena jarri behar duzu.");
        }

        if (elemento.validity.patternMismatch) {
            error2(elemento, "Izenaren gehienezko luzera 20 da.");
        }
        //error(elemento);
        return false;
    }
    return true;
}


function validaApellido() {
    var elemento = document.getElementById("apellido");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Abizena jarri behar duzu.");
        }

        if (elemento.validity.patternMismatch) {
            error2(elemento, "Abizenaren gehienezko luzera 30 da.");
        }
        //error(elemento);
        return false;
    }
    return true;
}

function validaIden() {
    var elemento = document.getElementById("usuario");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un identificador")
        }

        if (elemento.validity.patternMismatch) {
            error2(elemento, "letra, 8 numeros, letra");
        }
        //error(elemento);

        return false;
    } return true;
    alert("todo ok");
}

    function validaCorreo() {
        var elemento = document.getElementById("correo");
        if (!elemento.checkValidity()) {
            if (elemento.validity.valueMissing) {
                error2(elemento, "Debe introducir correo valido")
            }

            if (elemento.validity.patternMismatch) {
                error2(elemento, "debe tener ------@----.---");
            }
            //error(elemento);

            return false;
        } return true;

    }



    function validar(e) {
        borrarError();
        if (validaNombre() && validafecha() && validaCorreo() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
            return true
        } else {
            e.preventDefault();
            return false;
        }
    }

    function error(elemento) {
        document.getElementById("mensajeError").innerHTML = elemento.validationMessage;
        elemento.className = " error";
        elemento.focus();
    }

    function error2(elemento, mensaje) {
        document.getElementById("mensajeError").innerHTML = mensaje;
        elemento.className = " error";
        elemento.focus();
    }

    function borrarError() {
        var formulario = document.forms[0];
        for (var i = 0; i < formulario.elements.length; i++) {
            formulario.elements[i].className = "";
        }


    }
