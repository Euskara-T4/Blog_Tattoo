<?php
    include_once "../BD/conexionBD.php";
    header("Location: ../pages/update.php");
    
    // GUARDAR DATOS DE PERFIL
    if(isset($_POST["guardar1"])){

        if (!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["PssActual"]) || !isset($_POST["correo"])) exit(); {

            $Cactual = $_POST["PssActual"];
            $passHash = hash("sha256", $Cactual);

            $sqlU = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$passHash' AND erabiltzaile_iz='pruebas';";

            foreach ($conexionBD->query($sqlU) as $row) {

                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];
                $correoBD = $_POST["correoBD"];
                $nombreBD = $_POST["nombreBD"];
                $apeBD = $_POST["apeBD"];

                //sentencia para actualizar los datos de perfil de usuario
                $sql = "UPDATE erabiltzailea SET  izena=?, abizena=?, email=? WHERE erabiltzaile_iz='pruebas';";

                //en caso de no querer cambiar de correo....

                //si introducimos correo nuevo
                if ($correo != NULL ) {
                    $nuevoCorreo = $correo;
                }else{ 
                    $nuevoCorreo = $correoBD;
                }

                // Darle nuevo valor al nombre
                if ($nombre != NULL ) {
                    $nuevoNombre = $nombre;
                }else{ 
                    $nuevoNombre = $nombreBD;
                }


                // Darle nuevo valor al apellido
                if ($apellido != NULL ) {
                    $nuevoApe = $apellido;
                }else{ 
                    //en caso de no querer correo nuevo 
                    $nuevoApe = $apeBD;                    
                }

                // Si tdo esta bien
                $conexionBD->prepare($sql)->execute([$nuevoNombre, $nuevoApe, $nuevoCorreo]);
                


                exit;
            }
            echo "<h3>la contraseña no es correcta</h3>";
        }
    }



    // GUARDAR DATOS DE PERFIL
    if(isset($_POST["guardar2"])){
        if (!isset($_POST["contraseña"]) || !isset($_POST["nuevaContra"]) || !isset($_POST["repetirNueva"]) || !isset($_POST["guardar2"])) exit(); {

            $contraseña = $_POST["contraseña"];
            $passHash = hash("sha256", $contraseña);

            $sql = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$passHash' AND erabiltzaile_iz='pruebas';";
            foreach ($conexionBD->query($sql) as $row) {

                $nContrseña = $_POST["nuevaContra"];
                $rContraseña = $_POST["repetirNueva"];

                if ($nContrseña == $rContraseña ) {
                    $passHash = hash("sha256", $rContraseña);
                    //sentencia para actualizar los datos de perfil de usuario
                    $sql = "UPDATE erabiltzailea SET  pasahitza=? WHERE erabiltzaile_iz='pruebas';";
                    $conexionBD->prepare($sql)->execute([$passHash]);
                    echo "contraseña modificada";
                    exit;
                }else{
                    echo "las contraseñas no coindicen";
                }
                
                }
            echo "<h3>la contraseña no es correcta contraseña</h3>";
        }
    }
