<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>update</title>
</head>

<body>
    


        <?php

         include_once "../BD/conexionBD.php";
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
        <form method="POST" action="datosPerfil.php">
            <div name="DatosUsuario">
                <h3>datos de perfil</h3>
                <ul>
                    <li><label>nombre</label> <input class="btmspace-15" type="text" name="nombre" id="nombre" placeholder="<?php echo $izena; ?>">
                    </li>
                    <li> <label>apellido</label> <input class="btmspace-15" type="text" name="apellido" id="apellido" placeholder="<?php echo $abizena; ?>">

                    <li> <label>contraseña</label><input class="btmspace-15" type="password" name="PssActual" placeholder="***********">

                    </li>
                </ul>  
            </div>
            <input type="submit" value="guardar" name="guardar1">
        </form>
        
        <form method="POST" action="datosUsuario.php">
            <div name="DatosUsuario">
                <h3>datos de usuario</h3>
                <ul>
                    <li><label>contraseña actual</label> <input class="btmspace-15" type="text" name="contraseña" id="pss" placeholder="*********">
                    </li>
                    <li> <label>nueva cotraseña</label> <input class="btmspace-15" type="password" name="nuevaContra" id="pss">
                    <li> <label>repetir nueva contraseña</label><input class="btmspace-15" type="password" name="repetirNueva">

                    </li>
                </ul>  
            </div>
            <input type="submit" value="guardar" name="guardar2">
        </form>
        

        
                    <!-- php para actualizar usuario  -->











  
    
</body>

</html>