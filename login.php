<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
</head>
<body>
<?php 
include 'application/basededatos.php';

if (isset ( $_POST ['usuario'] )) {
	$Usuario = $_POST ['usuario'];
}
if (isset ( $_POST ['contrasena'] )) {
	$Contrasena = $_POST ['contrasena'];
}

$DBQuery = 'SELECT * FROM usuarios WHERE Nombre = "'.$Usuario.'";';

$DBResultado = mysqli_query($DBConexion,$DBQuery);

if ($DBResultado->num_rows > 0) {
	$Filas = $DBResultado->fetch_array ( MYSQLI_ASSOC );
	
	if ($Contrasena == $Filas ['Contrasena']) {
		$_SESSION ['SesionIniciada'] = true;
		$_SESSION ['Usuario'] = $Usuario;
		$_SESSION ['Inicio'] = time ();
		$_SESSION ['Expira'] = $_SESSION ['Inicio'] + (60*5);
		
		echo $_SESSION ['Usuario'].' Bienvenido!';
		header ( 'Location: principal.php' );
	} else {
		echo 'Contrase&ntilde;a incorrecta.';
		echo '<br><a href="/bancodesangre/">Volver a Intentarlo</a>';
	}
} else {
	echo 'El usuario no existe.'.mysqli_error($DBConexion).$DBREsultado->error;
	echo '<br><a href="/bancodesangre/">Volver a Intentarlo</a>';
}

mysqli_close ( $DBConexion );
?>
</body>
</html>