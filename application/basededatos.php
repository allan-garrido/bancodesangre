<?php
$DBServidor = '000webhost.com';
$DBUsuario = 'BSUser';
$DBContrasena = 'BS2016';
$DBBaseDeDatos = 'BS';
$DBConexion =  mysqli_connect( $DBServidor, $DBUsuario, $DBContrasena, $DBBaseDeDatos );

if (mysqli_connect_errno()) {
	die ( 'La conexion falló: ' . mysqli_connect_error() );
}
?>