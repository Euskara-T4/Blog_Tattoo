<?php
    // INICIAMOS LA SESION    
    session_start();

    // header("Location: iruzkinak.php");

    #Salir si alguno de los datos no esta presente
    if(!isset($_POST["iruzkina"])) exit();

    #Si todo va bien, se ejecuta esta parte del código...
    include_once "../BD/conexionBD.php";
    $nombre_usuario = $_SESSION["usuario"];
    $iruzkina = $_POST["iruzkina"];
    $id_gaia = $_POST["gaiaId"];
    $fecha = "2019/10/20";
            
    // // Insertamos a la base de datos
    $sentencia = $conexionBD-> prepare("INSERT INTO iruzkina(erabiltzaile_iz, id_gaia, iruzkina, sortze_data) VALUES (?, ?, ?, ?);");
    $resultado = $sentencia-> execute([$nombre_usuario, $id_gaia, $iruzkina, $fecha]); 

    if($resultado == true){
        echo "<h3>Iruzkina ondo sartu da DBan</h3>";    
    } else{
        echo "<h3>FAIL</h3>";
    }     
 
 ?>