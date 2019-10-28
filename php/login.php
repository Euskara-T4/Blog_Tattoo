<?php	
	include_once "../BD/conexionBD.php";
	  
	$nombre_usuario = $_POST["erabiltzaile_iz"];
	$pasahitza = $_POST["pasahitza"];
	// Tenemos la contraseña encriptada
	$passEncript = hash("sha256", $pasahitza);
	$userCorrect = comprobarUsuario($conexionBD, $nombre_usuario, $passEncript);

	if($userCorrect == true) {
		echo "<h3>ONGI ETORRI $nombre_usuario</h3>";
	} else{
		echo "<h3>Nombre o contraseña no son correctas--> $nombre_usuario // $passEncript</h3>";
	}

	function comprobarUsuario($conexionBD, $nombre_usuario, $passEncript){
		$sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz='$nombre_usuario' AND pasahitza='$passEncript'";

        foreach ($conexionBD->query($sql) as $row) {
			return true;
			header("Location: ../pages/user.html");
		}
		return false;
		header("Location: ../index.html");
	}
	
	// require('../BD/conexionBD.php');	
	// session_start();
	// if(isset($_SESSION["$nombre"])){
	// 	header("Location: welcome.php");
	// }
	
	// if(!empty($_POST)) {
	// 	$usuario = mysqli_real_escape_string($mysqli, $_POST['root']);
	// 	$password = mysqli_real_escape_string($mysqli, $_POST['']);
	// 	$error = '';
		
	// 	$sha1_pass = sha1($password);
		
	// 	$sql = "SELECT usuario_iz, id_tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
	// 	$result=$mysqli->query($sql);
	// 	$rows = $result->num_rows;
		
	// 	if($rows > 0) {
	// 		$row = $result->fetch_assoc();
	// 		$_SESSION['id_usuario'] = $row['id'];
	// 		$_SESSION['tipo_usuario'] = $row['id_tipo'];
			
	// 		header("location: welcome.php");
	// 		} else {
	// 		$error = "El nombre o contraseña son incorrectos";
	// 	}
	// }
?>