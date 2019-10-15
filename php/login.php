<?php
	require('../BD/conexionBD.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['root']);
		$password = mysqli_real_escape_string($mysqli,$_POST['']);
		$error = '';
		
		$sha1_pass = sha1($password);
		
		$sql = "SELECT usuario_iz, id_tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			$_SESSION['tipo_usuario'] = $row['id_tipo'];
			
			header("location: welcome.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>

































?>