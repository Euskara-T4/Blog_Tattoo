<?php	
    session_start();
     
    if(!isset($_POST["erabiltzailea"])) exit();

    // header("Location: iruzkinak.php");

    #Si todo va bien, se ejecuta esta parte del código...
    // include_once "../BD/conexionBD.php";

    // Valores del comentario
    $nombre_usuario = $_SESSION["usuario"];
    
    $erabiltzaile_iz = $_POST["erabiltzailea"];
    $nombre = $_POST["izena"];
    $apellido = $_POST["abizena"];
    $nombre_usuario = $_POST["email"];
    $password = $_POST["password"];
    $adminRol = $_POST["adminRol"];


    // SI HA SELECIONADO BORRAR
    if (isset($_POST['btnDelete'])){
        echo $erabiltzaile_iz;
        echo "EYYY";
        // borrarUsuario($erabiltzaile_iz);
    }

    // SI HA SELECCIONADO EDITAR
    if(isset($_POST['btnEdit'])){
        $iruzkina = $_POST["iruzkina"];

        if ($iruzkina != null){
            // Valores del comentario
            $nombre_usuario = $_SESSION["usuario"];
            $fecha = "2019/10/20";

            insertarComentario($nombre_usuario, $id_gaia, $iruzkina, $fecha);                          
        }
    }
    

    // COMPROBAR QUE BOTON HA SIDO SELECCIONADO
    // ------------------------------------------
    // EDITAR COMENTARIO
    function editarUsuario(){

    }

    // BORRAR COMENTARIO
    function borrarUsuario($erabiltzaile_iz){
        // Borrar el comentario seleccioando
        include_once "../BD/conexionBD.php";
        $sql = "DELETE FROM erabiltzailea WHERE erabiltzaile_iz='$erabiltzaile_iz';";
        echo $sql;
        $sentencia = $conexionBD-> prepare($sql);       
           
        if ($conexionBD->query($sql) == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: ";
        }
    }



?>