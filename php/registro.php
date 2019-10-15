







<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["apellido"])|| !isset($_POST["usuario"])|| !isset($_POST["correo"])|| !isset($_POST["contraseña"])) exit();
#Si todo va bien, se ejecuta esta parte del código...
include_once "conexionBD.php";
$nombre = $_POST["usuario"];
$apellido = $_POST["contraseña"];cd
$nombre_usuario = $_POST["contraseña"];
$correo = $_POST["contraseña"];
$pss = $_POST["contraseña"];
/*
    Al incluir el archivo "conexionBD.php", todas sus variables están
    a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
    copiado y pegado el código
*/
$sentencia = $conexionBD->prepare("INSERT INTO usuario(cod, nombre) VALUES (?, ?);");
$resultado = $sentencia->execute([$cod, $nombre]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar
if($resultado === TRUE) echo "Insertado correctamente $cod y $nombre";
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>