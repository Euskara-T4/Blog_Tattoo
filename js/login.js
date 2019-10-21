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
    document.getElementById("btnLogin").addEventListener("click", log);

}

function cancel() {
    document.getElementById('loginModal').style.display='none';
}


function log(){
    document.getElementById('loginModal').style.display='block';
    style="width:auto;"
}