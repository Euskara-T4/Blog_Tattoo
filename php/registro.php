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
/*
    Al incluir el archivo "conexionBD.php", todas sus variables están
    a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
    copiado y pegado el código
*/
$sentencia = $conexionBD->prepare("INSERT INTO erabiltzailea(izena, abizena, erabiltzaile_iz, email, pasahitza) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $apellido, $nombre_usuario, $correo, $pss]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
if($resultado === TRUE) echo "Insertado correctamente $nombre y $apellido";
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>