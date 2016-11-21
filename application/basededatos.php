<?php
$DBServidor = 'localhost';
$DBUsuario = 'a3936457_BSUser';
$DBContrasena = 'user3936457BS2016';
$DBBaseDeDatos = 'a3936457_BS';
$DBConexion =  mysql_connect( $DBServidor, $DBUsuario, $DBContrasena);
mysql_select_db($DBBaseDeDatos, $DBConexion);
?>