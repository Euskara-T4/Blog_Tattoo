window.addEventListener("load", hasiera);

function hasiera() {     
    var btnsEditUser = document.getElementsByClassName("iconEditUser");
    for (var i = 0; i < btnsEditUser.length; i++){
        btnsEditUser[i].addEventListener("click", editUser);
    }

    var btnsEditPost = document.getElementsByClassName("iconEditPost");
    for (var i = 0; i < btnsEditPost.length; i++){
        btnsEditPost[i].addEventListener("click", editPost);
    }

}


function editUser(e) {
    var icon = e.target;
    var erab = e.target.parentNode.className;

    var izena = document.getElementsByClassName(erab)[0];
    var abizena = document.getElementsByClassName(erab)[1];
    var email = document.getElementsByClassName(erab)[2];
    var password = document.getElementsByClassName(erab)[3];
    var adminRol = document.getElementsByClassName(erab)[4];

    // Comprobamos si estan para editar
    if (izena.readOnly) {
        izena.readOnly = false;
        abizena.readOnly = false;
        email.readOnly = false;
        password.readOnly = false;
        adminRol.readOnly = false;

        // Cambiamos el tipo de icono
        icon.className = "fa fa-lg fa-save iconEditUser";
        icon.parentNode.type ="button";       
    
    } else {
        izena.readOnly = true;
        abizena.readOnly = true;
        email.readOnly = true;
        password.readOnly = true;
        adminRol.readOnly = true;

        // Cambiamos el tipo de icono
        icon.className = "fa fa-lg fa-edit iconEditUser";
        icon.parentNode.type ="submit";       
    }
}
    
function editPost(e) {
    var icon = e.target;
    var title = e.target.parentNode.className;

    var titulua = document.getElementsByClassName(title)[0];
    var erabiltzaile_iz = document.getElementsByClassName(title)[1];
    var laburpena = document.getElementsByClassName(title)[2];

    // Comprobamos si estan para editar
    if (titulua.readOnly) {
        titulua.readOnly = false;
        erabiltzaile_iz.readOnly = false;
        laburpena.readOnly = false;
        
        // Cambiamos el tipo de icono         
        icon.className = "fa fa-lg fa-save iconEditPost";
        icon.parentNode.type ="button";          
    
    } else {
        titulua.readOnly = true;
        erabiltzaile_iz.readOnly = true;
        laburpena.readOnly = true;
        
        // Cambiamos el tipo de icono
        icon.className = "fa fa-lg fa-edit iconEditPost";
        icon.parentNode.type ="submit";     
    }


    
}