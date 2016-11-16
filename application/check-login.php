<?php
session_start ();

if (isset ( $_SESSION ['SesionIniciada'] ) && $_SESSION ['SesionIniciada'] == true) {
	echo $_SESSION ['Usuario'].' ';
} else {
	echo 'Esta pagina es solo para usuarios registrados.<br>';
	echo '<br><a href="/bancodesangre/">Iniciar sesion.</a>';
	
	exit ();
}

$now = time ();

if ($now > $_SESSION ['Expira']) {
	session_destroy ();
	
	echo 'Su sesion a terminado, <a href="/bancodesangre/">Necesita iniciar sesion</a>';
	exit ();
}
?>