<?php	
	include_once "../BD/conexionBD.php";
	  
	$nombre_usuario = $_POST["erabiltzaile_iz"];
	$pasahitza = $_POST["pasahitza"];
	// Tenemos la contraseña encriptada
	
	$passEncript = hash("sha256", $pasahitza);
	$adminRol = comprobarUsuario($conexionBD, $nombre_usuario, $passEncript);

	if($adminRol != null) {
		// Iniciar sesion cuando el usuario sea correcto
		session_start();
		$_SESSION["usuario"] = $nombre_usuario;
		
		if(isset($_SESSION["usuario"])){
			// header("Location: user.php");
			$_SESSION["adminRol"] = $adminRol; 
			header("Location: ../pages/index.php");
			echo "<h3>ONGI ETORRI", $_SESSION["usuario"], "</h3>";
		} else{
			echo "Ez da ondo ireki sesioa";
		}

	} else{
		echo "<h3>Nombre o contraseña no son correctas--> $nombre_usuario // $passEncript</h3>";
	}

	function comprobarUsuario($conexionBD, $nombre_usuario, $passEncript){
		$sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz='$nombre_usuario' AND pasahitza='$passEncript'";

        foreach ($conexionBD->query($sql) as $row) {
			$adminRol = $row['admin'];
			return $adminRol;
		}
		return null;
	}

?>