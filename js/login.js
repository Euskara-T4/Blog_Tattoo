window.addEventListener("load", hasiera);

function hasiera() {
    // Get the modal
    var modal = document.getElementById('loginModal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    document.getElementById("cancelBtn").addEventListener("click", cancel);
    document.getElementById("close").addEventListener("click", cancel);
    
    if(document.getElementById("btnLogin")){
        document.getElementById("btnLogin").addEventListener("click", log);
    }

    if(document.getElementById("btnLogout")){
        document.getElementById("btnLogout").addEventListener("click", logout);
    }

}

function cancel() {
    document.getElementById('loginModal').style.display='none';
}


function log(){
    document.getElementById('loginModal').style.display='block';
    style="width:auto;"
}

function logout(){
    window.open("../php/logout.php", "_self");
}