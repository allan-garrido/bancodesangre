<?php include 'application/check-login.php'; ?>

<?php include 'application/BaseDeDatos.php';?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editar perfil</title>
</head>
<body>
<form id="EditarPerfil" name="EditarPerfil" method="post">
<?php
$DBQuery = 'SELECT * FROM Usuarios WHERE nombre = "' . $_SESSION ['Usuario'] . '";';

$DBResultado = $DBConexion->query ( $DBQuery );

if ($DBResultado->num_rows > 0) {
	$Filas = $DBResultado->fetch_array ( MYSQLI_ASSOC );
	
	echo '<input type="hidden" name="IDUsuario" id="IDUsuario" value="'.$Filas['ID'].'">';
	echo '<br>Nombre: '.$Filas['Nombre'];
	//echo '<br>IDRol: '.$Filas['IDRol'];
	echo '<br><label>Contrase&ntilde;a: </label>';
	echo '<input type="password" name="ContrasenaUsuario" id="ContrasenaUsuario" value="'.$Filas['Contrasena'].'">';
}

$DBQuery = 'SELECT * FROM Roles WHERE ID = ' . $Filas ['ID'] . ';';

$DBResultado = $DBConexion->query ( $DBQuery );

if ($DBResultado->num_rows > 0) {
	$Filas = $DBResultado->fetch_array ( MYSQLI_ASSOC );
	
	echo '<br>Rol: '.$Filas['Rol'];
}

$DBQuery = 'SELECT * FROM Personas WHERE ID = ' . $Filas ['ID'] . ';';

$DBResultado = $DBConexion->query ( $DBQuery );

if ($DBResultado->num_rows > 0) {
	$Filas = $DBResultado->fetch_array ( MYSQLI_ASSOC );

	//echo '<br>Nombre completo: '.$Filas['NombreCompleto'];
	echo '<br><label>Nombre completo: </label>';
	echo '<input type="text" name="NombreCompleto" id="NombreCompleto" value="'.$Filas['NombreCompleto'].'">';
	//echo '<br>Direccion: '.$Filas['Direccion'];
	echo '<br><label>Direccion: </label>';
	echo '<input type="text" name="Direccion" id="Direccion" value="'.$Filas['Direccion'].'">';
	//echo '<br>Fecha de nacimiento: '.$Filas['FechaNacimiento'];
	echo '<br><label>Fecha de nacimiento: </label>';
	echo '<input type="date" name="FechaNacimiento" id="FechaNacimiento" value="'.$Filas['FechaNacimiento'].'">';
	//echo '<br>Correo electronico: '.$Filas['CorreoElectronico'];
	echo '<br><label>Correo electronico: </label>';
	echo '<input type="email" name="CorreoElectronico" id="CorreoElectronico" value="'.$Filas['CorreoElectronico'].'">';
} 

$DBQuery = 'SELECT * FROM Telefonos WHERE ID = ' . $Filas ['ID'] . ';';

$DBResultado = $DBConexion->query ( $DBQuery );

if ($DBResultado->num_rows > 0) {
	while ($Filas = $DBResultado->fetch_assoc()){
		//echo '<br>IDTelefono: '.$Filas['ID'];
		//echo '<br>Telefono: '.$Filas['Telefono'];
		
		echo '<br><label>Telefono: </label>';
		echo '<input type="text" name="Telefono" id="Telefono" value="'.$Filas['Telefono'].'">';
	}
}
	
mysqli_close ( $DBConexion );
?>
</form>
</body>
</html>	