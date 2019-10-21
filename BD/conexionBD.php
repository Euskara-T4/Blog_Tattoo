<?php
/*
	CRUD con MySQL y PHP	
*/
$contraseña = "";
$usuario = "root";
$BD = "blog";
try{
	$conexionBD = new PDO('mysql:host=localhost; dbname=' . $BD, $usuario, $contraseña);
	}catch(Exception $e){
		echo "Ocurrió algo con la base de datos: " . $e->getMessage();
	}

echo "conexion exitosa";
?>