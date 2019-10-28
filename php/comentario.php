<?php
    // header("Location: iruzkinak.php");

    #Salir si alguno de los datos no esta presente
    if(!isset($_POST["iruzkina"])) exit();

    #Si todo va bien, se ejecuta esta parte del código...
    include_once "../BD/conexionBD.php";
    $nombre_usuario = "nahia19";
    $iruzkina = $_POST["iruzkina"];
    echo "hola"  ;
            
    // // Insertamos a la base de datos
    // $sentencia = $conexionBD-> prepare("INSERT INTO iruzkina(erabiltzaile_iz, id_gaia, iruzkina, data) VALUES (?, ?, ?, ?, ?);");
    // $resultado = $sentencia-> execute([$nombre_usuario, $correo, $passHash]); 

    // if($resultado == true){
    //     echo "<h3>Iruzkina ondo sartu da DBan</h3>";
    
    // } else{
    //     echo "<h3>FAIL</h3>";
    // }     
 
 ?>