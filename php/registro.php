<?php
    // INICIAMOS LA SESION
    session_start();

    header("Location: ../index.html");
    
    #Salir si alguno de los datos no está presente
    if(!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["usuario"]) || !isset($_POST["correo"]) || !isset($_POST["contraseña"]) || !isset($_POST["contraseña_confirm"])) exit();

    #Si todo va bien, se ejecuta esta parte del código...
    include_once "../BD/conexionBD.php";
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nombre_usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $pss = $_POST["contraseña"];
    $pss2 = $_POST["contraseña_confirm"];  

    // COMPROBACIONES DB
    $userNameExist = comprobarUsuario($conexionBD, $nombre_usuario);
    $emailExist = comprobarCorreo($conexionBD, $correo);
    
    if($userNameExist == false &&  $emailExist == false){
        insertarUsuario($conexionBD, $nombre, $apellido, $nombre_usuario, $correo, $pss2);    
    } else{
        echo "<h3>Fail insertar el usuario</h3>";
    }          
  
    // Comprobaremos si el usuario ya metido existe en la base de datos
    function comprobarUsuario($conexionBD, $nombre_usuario){
        $sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz='$nombre_usuario'";
        foreach ($conexionBD->query($sql) as $row) {
            echo "<h3>Nombre de usuario -- $nombre_usuario -- ya existe</h3>";
            return true;
        }
        echo "<h3>Nombre de usuario -- $nombre_usuario -- NO existe</h3>";
        return false;
    }

    // Comprobaremos si el correo ya metido existe en la base de datos
    function comprobarCorreo($conexionBD, $correo){
        $sql = "SELECT * FROM erabiltzailea WHERE email='$correo'";
        foreach ($conexionBD->query($sql) as $row) {
            echo "<h3>Usuario con correo -- $correo -- ya existe</h3>";
            return true;
        }
        echo "<h3>Usuario con correo -- $correo -- NO existe</h3>";
        return false;
    }

    // Despues de hacer las comprobaciones, insertamos a la base de datos
    function insertarUsuario($conexionBD, $nombre, $apellido, $nombre_usuario, $correo, $pss2) {
        $passHash = hash("sha256", $pss2);
        $sentencia = $conexionBD-> prepare("INSERT INTO erabiltzailea(izena, abizena, erabiltzaile_iz, email, pasahitza) VALUES (?, ?, ?, ?, ?);");
        $resultado = $sentencia-> execute([$nombre, $apellido, $nombre_usuario, $correo, $passHash]); 
        
        if($resultado == true){
            echo "<h3>Usuario insertado correctamente</h3>";
        } else{
            echo "<h3>FAIL</h3>";
        }     
    }
   
?>
