<?php
  // INICIAMOS LA SESION
  session_start();
  $currentUser = $_SESSION['usuario'];

    include_once "../BD/conexionBD.php";
    header("Location: ../pages/update.php");    
    
    // GUARDAR DATOS DE PERFIL
    if(isset($_POST["guardar1"])){

        if (!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["PssActual"]) || !isset($_POST["correo"])) exit(); {
            $currentUser = $_SESSION['usuario'];
            $Cactual = $_POST["PssActual"];
            $passHash = hash("sha256", $Cactual);

            $sqlU = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$passHash' AND erabiltzaile_iz='$currentUser';";

            foreach ($conexionBD->query($sqlU) as $row) {

                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];

                //sentencia para actualizar los datos de perfil de usuario
                $sql = "UPDATE erabiltzailea SET  izena=?, abizena=?, email=? WHERE erabiltzaile_iz='$currentUser';";
                
                echo $sql;
                $conexionBD->prepare($sql)->execute([$nombre, $apellido, $correo]);                

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

            $sql = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$passHash' AND erabiltzaile_iz='$currentUser';";
            foreach ($conexionBD->query($sql) as $row) {

                $nContrseña = $_POST["nuevaContra"];
                $rContraseña = $_POST["repetirNueva"];

                if ($nContrseña == $rContraseña ) {
                    $passHash = hash("sha256", $rContraseña);

                    $sql = "UPDATE erabiltzailea SET  pasahitza=? WHERE erabiltzaile_iz='$currentUser';";
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
