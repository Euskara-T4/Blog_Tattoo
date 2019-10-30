<?php	
	include_once "../BD/conexionBD.php";
	  
	$nombre_usuario = $_POST["erabiltzaile_iz"];
	$pasahitza = $_POST["pasahitza"];
	// Tenemos la contraseña encriptada
	
	$passEncript = hash("sha256", $pasahitza);
	$userCorrect = comprobarUsuario($conexionBD, $nombre_usuario, $passEncript);

	if($userCorrect == true) {
		// Iniciar sesion cuando el usuario sea correcto
		session_start();
		$_SESSION["usuario"] = $nombre_usuario;

		if(isset($_SESSION["usuario"])){
			// header("Location: user.php");
			header("Location: ../index.php");
			echo "<h3>ONGI ETORRI", $_SESSION["usuario"], "</h3>";
		}else{
			echo "Ez da ondo ireki sesioa";
		}

	} else{
		echo "<h3>Nombre o contraseña no son correctas--> $nombre_usuario // $passEncript</h3>";
	}

	function comprobarUsuario($conexionBD, $nombre_usuario, $passEncript){
		$sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz='$nombre_usuario' AND pasahitza='$passEncript'";

        foreach ($conexionBD->query($sql) as $row) {
			return true;
			// header("Location: ../pages/user.html");
		}
		return false;
	}

?>