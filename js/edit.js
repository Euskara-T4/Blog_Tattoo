window.addEventListener("load", hasiera);

function hasiera() {
    document.getElementById("btnEdit").addEventListener("click", editUser);
}

function editUser() {
    var izena = document.getElementById("izena");
    var abizena = document.getElementById("abizena");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var adminRol = document.getElementById("adminRol");
    var icon = document.getElementById("iconEdit");
    var btn = document.getElementById("btnEdit");



    // Comprobamos si estan para editar
    if (izena.readOnly) {
        izena.readOnly = false;
        abizena.readOnly = false;
        email.readOnly = false;
        password.readOnly = false;
        adminRol.readOnly = false;
        icon.className = "fa fa-lg fa-save";
        btn.type ="button";
        
        // CAMBIAR ESTILO
        izena.style.border = "1px solid #ccc !important";
        izena.style.backgroundColor = "grey !important";

    } else {
        izena.readOnly = true;
        abizena.readOnly = true;
        email.readOnly = true;
        password.readOnly = true;
        adminRol.readOnly = true;
        icon.className = "fa fa-lg fa-edit";
        btn.type = "submit";

        // LLAMAR AL PHP PARA ACTUALIZAR DATOS
        // window.open("../php/ajustes.php", "_self");

        // CAMBIAR ESTILO
        izena.style.border = "none !important";
        izena.style.backgroundColor = "transparent !important";
    }

}