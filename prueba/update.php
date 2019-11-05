<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/validacion.js"></script>
    <title>update</title>
</head>
<body>
<ul>

   
    <li><?php  include_once "../BD/conexionBD.php";
        /*seleccionaremos los datos del usuario de la BD y los mostraremos para modificar*/
                $sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz = 'ruedaslocas'";  

                foreach ($conexionBD->query($sql) as $row) {
                $usuario = $row['erabiltzaile_iz'];
                $izena = $row['izena'];
                $abizena = $row['abizena'];
                $email = $row['email'];
                $pasahitza = $row['pasahitza'];
                
                echo $usuario;
                                                                                        
                }
                                                                                        
  ?>
 <!--creamos un form con los posibles datos a modificar-->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <li> <input class="btmspace-15" type="text" name="nombre" id="nombre" pattern="[A-Za-zñÑ ]{1,20}" minlength="2" maxlength="20" required value="<?php echo $izena; ?>">
    </li>
    <li> <input class="btmspace-15" type="text" name="apellido" id="apellido" pattern="[A-Za-zñÑ ]{1,30}" minlength="2" maxlength="30" required value="<?php echo $abizena; ?>">
    </li>
    <li> <input class="btmspace-15" type="text" name="correo" id="correo" pattern="[A-Za-z.0-9-_]{1,20}[@][a-z]{1,20}[.][a-z]{1,3}" minlength="10" maxlength="50" required value="<?php echo $email; ?>"><br>
    </li>
        <p>contraseña actual </p>
    <li> <input class="btmspace-15" type="password" name="PssActual" pattern="[A-Za-zÑñ0-9]{1,20}" minlength="5" maxlength="100" required >
         <input class="btmspace-15" type="hidden" name="PssRepetir" value="<?php echo $pasahitza; ?>">
    </li>
        <p>nueva contraseña </p>
    <li> <input class="btmspace-15" type="password" name="PssNueva" id="contraseña2" pattern="[A-Za-zÑñ0-9]{1,20}" minlength="5" maxlength="100" required>
         <input class="btmspace-15" type="hidden" name="PssRepetir" value="<?php echo $pasahitza; ?>">

    </li>
        <p>repetir contraseña nueva </p>
    <li> <input class="btmspace-15" type="password" name="PssRepetir" id="contraseña">
         <input class="btmspace-15" type="hidden" name="PssRepetir" value="<?php echo $pasahitza; ?>">

    </li>  
    
    <input type="submit" value="guardar">
</form>

                                                                             
<?php


/*recogemos los datos para actualizar la BD */
if(!isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["correo"]) || ($_POST["PssActual"]) || !isset($_POST["PssNueva"]) || !isset($_POST["PssRepetir"])) exit();
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $pss=$_POST['PssActual'];
    $Cactual = hash("sha256", $pss);
    $Cnueva=$_POST['PssNueva'];
    $Cnueva2=$_POST['PssRepetir'];
/**comrpobar contraseña actual */
    function comprobarContraseña($conexionBD, $Cactual){


        $sql = "SELECT pasahitza FROM erabiltzailea WHERE pasahitza='$Cactual'";
        foreach ($conexionBD->query($sql) as $row) {
            echo "<h3>la contraseña no coincide $Cactual</h3>";
            return true;
        }
        return false;

    }
/*comprobar que el correo no exista ya en la BD */
    function comprobarCorreo($conexionBD, $correo){
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