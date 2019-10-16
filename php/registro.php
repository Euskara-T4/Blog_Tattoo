<?php
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

    if($pss == $pss2){
        $passHash = password_hash($pss, PASSWORD_DEFAULT);
        $sentencia = $conexionBD-> prepare("INSERT INTO erabiltzailea(izena, abizena, erabiltzaile_iz, email, pasahitza) VALUES (?, ?, ?, ?, ?);");
        $resultado = $sentencia-> execute([$nombre, $apellido, $nombre_usuario, $correo, $passHash]); 
        // if($resultado === TRUE) echo "Insertado correctamente $nombre y $apellido";
        // else echo "Algo salió mal. Por favor verifica que la tabla exista";
    }
?>