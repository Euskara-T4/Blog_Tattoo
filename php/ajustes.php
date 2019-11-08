<?php	
    session_start();
     
    if(!isset($_POST['btnDelete']) || !isset($_POST['btnEdit'])) exit();

    $erabiltzaile_iz = $_POST["erabiltzailea"];
    $izena = $_POST["izena"];
    $abizena = $_POST["abizena"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adminRol = $_POST["adminRol"];


    // SI HA SELECIONADO BORRAR
    if (isset($_POST['btnDelete'])){
        borrarUsuario($erabiltzaile_iz);
    }

    // SI HA SELECCIONADO EDITAR
    if(isset($_POST['btnEdit'])){     
        editarUsuario($nombre_usuario, $izena, $abizena, $email, $password, $adminRol);                                 
    }
    
    echo "ey";
    // header("Location: ../pages/ajusteak.php");


    // COMPROBAR QUE BOTON HA SIDO SELECCIONADO
    // ------------------------------------------
    // EDITAR USUARIO
    function editarUsuario($nombre_usuario, $izena, $abizena, $email, $password, $adminRol){
        include_once "../BD/conexionBD.php";

        $sql = "UPDATE erabiltzailea SET izena='$izena', abizena='$abizena', email='$email', pasahitza='$password', admin='$adminRol' WHERE erabiltzaile_iz='$nombre_usuario'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // BORRAR USUARIO
    function borrarUsuario($erabiltzaile_iz){
        include_once "../BD/conexionBD.php";

        $sql = "DELETE FROM erabiltzailea WHERE erabiltzaile_iz='$erabiltzaile_iz';";
        echo $sql;
        $sentencia = $conexionBD-> prepare($sql);       
           
        if ($conexionBD->query($sql) == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record";
        }
    }



?>