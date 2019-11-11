<?php	
    session_start();   

    // SI HA SELECCIONADO EDITAR USUARIO
    if(isset($_POST['btnEditUser'])){    
        // Datos de usuarios
        $erabiltzaile_iz = $_POST["erabiltzailea"];
        $izena = $_POST["izena"];
        $abizena = $_POST["abizena"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $adminRol = $_POST["adminRol"];

        // Me coge el valor anterior
        echo $izena;
        //editarUsuario($erabiltzaile_iz, $izena, $abizena, $email, $password, $adminRol);                                 
    }

    // SI HA SELECIONADO BORRAR USUARIO
    if (isset($_POST['btnDeleteUser'])){
        $erabiltzaile_iz = $_POST["erabiltzailea"];
        echo $erabiltzaile_iz;
        //borrarUsuario($erabiltzaile_iz);
    }

    

    // SI HA SELECCIONADO EDITAR POST
    if(isset($_POST['btnEditPost'])){     
        // Datos del post
        $titulua = $_POST["titulua"];
        $sortzailea = $_POST["erabiltzaile_iz"];
        $laburpena = $_POST["laburpena"];

        echo $izena;

        editarPost($titulua, $sortzailea, $laburpena);                                 
    }

    // SI HA SELECIONADO BORRAR POST
    if (isset($_POST['btnDeletePost'])){
        $titulua = $_POST["titulua"];
        borrarPost($titulua);
    }
    
    
    // header("Location: ../pages/ajusteak.php");


    // COMPROBAR QUE BOTON HA SIDO SELECCIONADO
    // ------------------------------------------
    // EDITAR USUARIO
    function editarUsuario($erabiltzaile_iz, $izena, $abizena, $email, $password, $adminRol){
        include_once "../BD/conexionBD.php";

        $sql = "UPDATE erabiltzailea SET izena=?, abizena=?, email=?, pasahitza=?, admin=? WHERE erabiltzaile_iz='$erabiltzaile_iz';";
        $sentencia = $conexionBD-> prepare($sql);
        $resultado = $sentencia-> execute([$izena, $abizena, $email, $password, $adminRol]); 

        if ($resultado === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record ";
        }
    }

    // BORRAR USUARIO
    function borrarUsuario($erabiltzaile_iz){
        include_once "../BD/conexionBD.php";
        
        // BORRA EL QUE NO ES
        $sql = "DELETE FROM erabiltzailea WHERE erabiltzaile_iz='$erabiltzaile_iz';";
        echo $sql;
        $sentencia = $conexionBD-> prepare($sql);       
           
        if ($conexionBD->query($sql) == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record";
        }
    }



    // EDITAR POST
    function editarPost($titulua, $sortzailea, $laburpena){
        include_once "../BD/conexionBD.php";

        $sql = "UPDATE gaia SET titulua=?, erabiltzaile_iz=?, laburpena=? WHERE titulua='$titulua';";
        $sentencia = $conexionBD-> prepare($sql);
        $resultado = $sentencia-> execute([$titulua, $sortzailea, $laburpena, $password, $adminRol]); 

        if ($resultado === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record ";
        }
    }

    // BORRAR POST
    function borrarPost($titulua){
        include_once "../BD/conexionBD.php";

        $sql = "DELETE FROM gaia WHERE titulua='$titulua';";
        echo $sql;
        $sentencia = $conexionBD-> prepare($sql);       
           
        if ($conexionBD->query($sql) == TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record";
        }
    }



?>