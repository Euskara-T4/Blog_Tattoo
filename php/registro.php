<?php

    header("Location: ../index.html");
    
    #Salir si alguno de los datos no está presente
    if(!isset($_POST["nombre"]) || !isset($_POST["apellido"])|| !isset($_POST["usuario"])|| !isset($_POST["correo"])|| !isset($_POST["contraseña"])) exit();

    #Si todo va bien, se ejecuta esta parte del código...
    include_once "../BD/conexionBD.php";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nombre_usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $pss = $_POST["contraseña"];
    $pss2 = $_POST["contraseña_confirm"];


    // COMPROBACIONES DB
    if($pss == $pss2){
        // Comprobar si el usuario ya existe en la BD
        $sentencia = $conexionBD-> query("SELECT * FROM erabiltzailea WHERE erabiltzaile_iz='$nombre_usuario'");
        $select = mysql_fetch_array($sentencia);
        if ($select->num_rows > 0) {
            echo "<h3>Ese nombre de usuario ya existe</h3>";
        } else {
            $passHash = password_hash($pss, PASSWORD_DEFAULT);
            $sentencia = $conexionBD-> prepare("INSERT INTO erabiltzailea(izena, abizena, erabiltzaile_-iz, email, pasahitza) VALUES (?, ?, ?, ?, ?);");
            $resultado = $sentencia-> execute([$nombre, $apellido, $nombre_usuario, $correo, $passHash]); 
            
            if($resultado == true){
                echo "<h3>Usuario insertado correctamente</h3>";
            }
        } 
    } else{
        echo "<h3>Las contraseñas no coinciden</h3>";
    }
    // nahiaaaa19
   
?>
