<?php
    include_once "../BD/conexionBD.php";


        if (!isset($_POST["contraseña"]) || !isset($_POST["nuevaContra"]) || !isset($_POST["repetirNueva"]) || !isset($_POST["guardar2"])) exit(); {

            $contraseña = $_POST["contraseña"];


            $sql = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$contraseña' AND erabiltzaile_iz='pinpin23';";
            foreach ($conexionBD->query($sql) as $row) {

                $nContrseña = $_POST["nuevaContra"];
                $rContraseña = $_POST["repetirNueva"];
                if ($nContrseña != $rContraseña) {
                    echo "las contraseñas no coinciden";
                }else{
                    //sentencia para actualizar los datos de perfil de usuario
                   $sql = "UPDATE erabiltzailea SET  pasahitza=? WHERE erabiltzaile_iz='pinpin23';";
                   $conexionBD->prepare($sql)->execute([$nContraseña]);
                   exit;
                }

                   
            }
            echo "<h3>la contraseña no es correcta contraseña</h3>";
        }
        ?>