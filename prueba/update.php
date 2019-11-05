<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>update</title>
</head>

<body>
    <ul>


        <li><?php include_once "../BD/conexionBD.php";
            /*seleccionaremos los datos del usuario de la BD y los mostraremos para modificar*/
            $sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz = 'pinpin23'";

            foreach ($conexionBD->query($sql) as $row) {
                $usuario = $row['erabiltzaile_iz'];
                $izena = $row['izena'];
                $abizena = $row['abizena'];
                $email = $row['email'];
                $pasahitza = $row['pasahitza'];

                echo "<h1>$usuario</h1>";
            }

            ?>
            <!--creamos un form con los posibles datos a modificar-->
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div name="DatosUsuario">
                    <h3>datos de usuario</h3>
                    <li><label >nombre</label> <input class="btmspace-15" type="text" name="nombre" id="nombre" placeholder="<?php echo $izena; ?>">
                    </li>
                    <li> <label >apellido</label> <input class="btmspace-15" type="text" name="apellido" id="apellido"  placeholder="<?php echo $abizena; ?>">
                    <li> <label >contraseña</label><input class="btmspace-15" type="password" name="PssActual" placeholder="***********">
                    <!-- <input class="btmspace-15" type="hidden" name="PssRepetir" value="<?php echo $pasahitza; ?>"> -->
                    </li>
                    
                </div>
        <?php
        // $pasahitza = $row['pasahitza'];
        if (!isset($_POST['PssActual'])) {
            $pass = $_POST['PssActual'];
            $passHash = hash("sha256", $pass);
            $sql = "SELECT pasahitza FROM erabiltzailea WHERE erabiltzaile_iz = 'pinpin23' AND pasahitza = '$passHash';";


            foreach ($conexionBD->query($sql) as $row) {
                return true;
            }
            echo "contraseña no coincide";
        }

        ?>

        <div>
            <h3>datos de perfil</h3>
            <li><label >correo</label> <input class="btmspace-15" type="text" name="correo" id="correo" value="<?php echo $email; ?>"><br>
            
            <li> <label>nueva contraseña</label><input class="btmspace-15" type="password" name="PssNueva" id="contraseña2" pattern="[A-Za-zÑñ0-9]{1,20}" minlength="5" maxlength="100" required>
                <input class="btmspace-15" type="hidden" name="PssRepetir" value="<?php echo $pasahitza; ?>">

            </li>
            <li><label >repetir contraseña</label> <input class="btmspace-15" type="password" name="PssRepetir" id="contraseña">
                <input class="btmspace-15" type="hidden" name="PssRepetir" value="<?php echo $pasahitza; ?>">

            </li>
        </div>

        <input type="submit" value="guardar">
        </form>


        <?php


        /*recogemos los datos para actualizar la BD */
        if (!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["correo"]) || ($_POST["PssActual"]) || !isset($_POST["PssNueva"]) || !isset($_POST["PssRepetir"])) exit();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $pss = $_POST['PssActual'];
        $Cactual = hash("sha256", $pss);
        $Cnueva = $_POST['PssNueva'];
        $Cnueva2 = $_POST['PssRepetir'];
        /**comrpobar contraseña actual */
        function comprobarContraseña($conexionBD, $Cactual)
        {


            $sql = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$Cactual'";
            foreach ($conexionBD->query($sql) as $row) {
                echo "<h3>la contraseña no coincide $Cactual</h3>";
                return true;
            }
            return false;
        }
        /*comprobar que el correo no exista ya en la BD */
        function comprobarCorreo($conexionBD, $correo)
        {
            $sql = "SELECT * FROM erabiltzailea WHERE email='$correo'";
            foreach ($conexionBD->query($sql) as $row) {
                echo "<h3>Usuario con correo -- $correo -- ya existe</h3>";
                return true;
            }
            echo "<h3>Usuario con correo -- $correo -- NO existe</h3>";
            return false;
        }


        ?>



    </ul>











</body>

</html>