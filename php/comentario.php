<?php
    // INICIAMOS LA SESION    
    session_start();

    // header("Location: iruzkinak.php");

    #Si todo va bien, se ejecuta esta parte del código...
    // include_once "../BD/conexionBD.php";
    
    $id_gaia = $_POST["idGaia"];

    
    // SI HA SELECIONADO BORRAR
    if (isset($_POST['btnDelete'])){
        $id_iruzkina = $_POST["iruzkinaId"];
        borrarComentario($id_iruzkina);
    }

    // SI HA SELECCIONADO INSERTAR
    if(isset($_POST['send'])){
        $iruzkina = $_POST["iruzkina"];

        if ($iruzkina != null){
            // Valores del comentario
            $nombre_usuario = $_SESSION["usuario"];
            $fecha = "2019/10/20";

            insertarComentario($nombre_usuario, $id_gaia, $iruzkina, $fecha);                          
        }
    }

    header("Location: ../pages/iruzkinak.php?idGaia=$id_gaia");

   
      
    // COMPROBAR QUE BOTON HA SIDO SELECCIONADO
    // ------------------------------------------
    // MANDAR COMENTARIO
    function insertarComentario($nombre_usuario, $id_gaia, $iruzkina, $fecha){
        include_once "../BD/conexionBD.php";
        $sql = "INSERT INTO iruzkina(erabiltzaile_iz, id_gaia, iruzkina, sortze_data) VALUES (?, ?, ?, ?);";
        $sentencia = $conexionBD-> prepare($sql);
        $resultado = $sentencia-> execute([$nombre_usuario, $id_gaia, $iruzkina, $fecha]); 

        if ($resultado == true) {
            echo "<h3>Iruzkina ondo sartu da DBan</h3>";    
        } else {
            echo "<h3>FAIL</h3>";
        } 

    }

    
    // BORRAR COMENTARIO
    function borrarComentario($id_iruzkina){
        // Borrar el comentario seleccioando
        include_once "../BD/conexionBD.php";
        $sql = "DELETE FROM iruzkina WHERE id_iruzkina='$id_iruzkina';";       
        $sentencia = $conexionBD-> prepare($sql);       
           
        if ($conexionBD->query($sql) == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: ";
        }

    }
    
 
 ?>