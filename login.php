<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Banco de Sangre</title>
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
$DBResultado = mysql_query($DBQuery,$DBConexion);

if (mysql_num_rows($DBResultado) > 0) {
	$Filas = mysql_fetch_assoc($DBResultado);
	
	if ($Contrasena == $Filas ['Contrasena']) {
		$_SESSION ['SesionIniciada'] = true;
		$_SESSION ['Usuario'] = $Usuario;
		$_SESSION ['Inicio'] = time ();
		$_SESSION ['Expira'] = $_SESSION ['Inicio'] + (60*5);
		
		echo $_SESSION ['Usuario'].' Bienvenido!';
		header ( 'Location: principal.php' );
	} else {
		echo 'Contrase&ntilde;a incorrecta.';
		echo '<br><a href="/">Volver a Intentarlo</a>';
	}
} else {
	echo 'El usuario no existe. '.mysql_error($DBConexion).$DBREsultado->error;
	echo '<br><a href="/">Volver a Intentarlo</a><br>';
	
}

mysql_close ( $DBConexion );
?>
</body>
</html>