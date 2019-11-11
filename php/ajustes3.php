<?php	
    session_start();   

    // SI HA SELECCIONADO EDITAR USUARIO
    if(isset($_POST['btnEditUser'])){    
        // Datos de usuarios
        $erabiltzaile_iz = $_POST["erabiltzailea"];
        $izena = $_POST["izena"];
        $abizena = $_POST["abizena"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $adminRol = $_POST["adminRol"];

        //datos de BD
       /* $correoBD = $_POST["correoBD"];
        $nombreBD = $_POST["nombreBD"];
        $apeBD = $_POST["apeBD"];*/

                //sentencia para actualizar los datos de perfil de usuario
                $sql = "UPDATE erabiltzailea SET  izena=?, abizena=?, email=? WHERE erabiltzaile_iz='$currentUser';";

                //en caso de no querer cambiar de correo....

                //si introducimos correo nuevo
                if ($email != NULL ) {
                    $nuevoCorreo = $email;
                }

                // Darle nuevo valor al nombre
                if ($izena != NULL ) {
                    $nuevoNombre = $izena;
                }

                // Darle nuevo valor al apellido
                if ($abizena != NULL ) {
                    $nuevoApe = $abizena;
                }

                // Si todo esta bien



               // echo $nuevoNombre .$nuevoApe. $nuevoCorreo;

                $conexionBD->prepare($sql)->execute([$nuevoNombre, $nuevoApe, $nuevoCorreo]);                
                //echo $sql;

                exit;
            }
            echo "<h3>la contraseña no es correcta</h3>";
        // Me coge el valor anterior
        echo $izena;
        //editarUsuario($erabiltzaile_iz, $izena, $abizena, $email, $password, $adminRol);                                 
    


?>