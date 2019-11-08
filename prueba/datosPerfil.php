<?php
    include_once "../BD/conexionBD.php";


        if (!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["PssActual"]) || !isset($_POST["guardar1"])) exit(); {

            $Cactual = $_POST["PssActual"];
           // $passHash = hash("sha256", $Cactual);

            $sql = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$Cactual' AND erabiltzaile_iz='pinpin23';";
            foreach ($conexionBD->query($sql) as $row) {

                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];

                //sentencia para actualizar los datos de perfil de usuario
                $sql = "UPDATE erabiltzailea SET  izena=?, abizena=? WHERE erabiltzaile_iz='pinpin23';";
                $conexionBD->prepare($sql)->execute([$nombre, $apellido]);
                echo"datos modificados correctamente";
                exit;
            }
            echo "<h3>la contraseña no es correcta</h3>";
        }
        ?>