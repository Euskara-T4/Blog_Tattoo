<?php
    // INICIAMOS LA SESION
    session_start();

    if(!isset($_POST["enviar"])) exit();

    echo "ey";

    #Si todo va bien, se ejecuta esta parte del código...
    include_once "../BD/conexionBD.php";
    $sortzailea = $_SESSION['usuario'];
    $titulua = $_POST["titulua"];
    $laburpena = $_POST["laburpena"];
    $deskribapena = $_POST["deskribapena"];
    $argazkia = $_POST["argazkia"];
    $izena = $_POST["izena"];


    // COMPROBACIONES DB
    $temaExist = comprobarTema($conexionBD, $titulua);

    if($temaExist == false){
        insertarTema($conexionBD, $titulua, $sortzailea, $laburpena, $deskribapena, $izena, $argazkia);       
    } else{
        echo "<h3>Fail insertar el tema</h3>";
    }          

    // Comprobaremos si el tema ya metido existe en la base de datos
    function comprobarTema($conexionBD, $titulua){
        $sql = "SELECT * FROM gaia WHERE titulua='$titulua'";

        foreach ($conexionBD->query($sql) as $row) {
            echo "<h3>Tema -- $titulua -- ya existe</h3>";
            return true;
        }
        echo "<h3>Tema -- $titulua -- NO existe</h3>";
        return false;
    }

    // Despues de hacer las comprobaciones, insertamos a la base de datos
    function insertarTema($conexionBD, $titulua, $sortzailea, $laburpena, $deskribapena, $izena, $argazkia) {
        $sentencia = $conexionBD-> prepare("INSERT INTO gaia(erabiltzaile_iz, titulua, laburpena, deskribapena) VALUES (?, ?, ?, ?);");
        $resultado = $sentencia-> execute([$sortzailea, $titulua, $laburpena, $deskribapena]); 
        
        if($resultado == true){
            echo "<h3>Tema insertado correctamente</h3>";
            insertarFoto($conexionBD, $titulua, $izena, $argazkia);
        } else{
            echo "<h3>FAIL</h3>";
        }     
    }

    // Insertamos la foto en la base de datos
    function insertarFoto($conexionBD, $titulua, $izena, $argazkia){
        $sql = "SELECT * FROM gaia WHERE titulua='$titulua'";

        foreach ($conexionBD->query($sql) as $row) {
            $id_gaia = $row['id_gaia'];                            
        }

        $argazkiaUrl = "../images/tattoos/$titulua/$argazkia";

        if($id_gaia != null) {
            $sentencia = $conexionBD-> prepare("INSERT INTO argazkia(id_gaia, izena, url) VALUES (?, ?, ?);");
            $resultado = $sentencia-> execute([$id_gaia, $izena, $argazkiaUrl]); 
            
            if($resultado == true){
                echo "<h3>Foto insertado correctamente</h3>";
            } else{
                echo "<h3>FAIL</h3>";
            }   
        }


        echo "<h3>Tema -- $titulua -- NO existe</h3>";

    }          
        


?>