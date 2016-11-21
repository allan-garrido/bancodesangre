<?php
if (isset($_POST['IDDonante'])) { $IDDonante = $_POST['IDDonante']; }
if (isset($_POST['NombreCompleto'])) { $NombreCompleto = $_POST['NombreCompleto']; }
if (isset($_POST['FechaNacimiento'])) { $FechaNacimiento = $_POST['FechaNacimiento']; }
if (isset($_POST['Direccion'])) { $Direccion = $_POST['Direccion']; }
if (isset($_POST['CorreoElectronico'])) { $CorreoElectronico = $_POST['CorreoElectronico']; }
if (isset($_POST['Peso'])) { $Peso = $_POST['Peso']; }
if (isset($_POST['IDDonacion'])) { $IDDonacion = $_POST['IDDonacion']; }
if (isset($_POST['Fecha'])) { $Fecha = $_POST['Fecha']; }
if (isset($_POST['Hora'])) { $Hora = $_POST['Hora']; }
if (isset($_POST['FactorRH'])) { $FactorRH = $_POST['FactorRH']; }
if (isset($_POST['TipoDeSangre'])) { $TipoDeSangre = $_POST['TipoDeSangre']; }
if (isset($_POST['IDAlmacen'])) { $IDAlmacen = $_POST['IDAlmacen']; }

include 'basededatos.php';

$DBQuery = 'INSERT INTO donantes(ID,Peso) VALUES('.$IDDonante.','.$Peso.')';

if (mysql_query($DBQuery,$DBConexion) === TRUE) {
    echo 'New record created successfully';
} else {
    echo 'Error: ' . $DBConexion->error;
}

$DBQuery = 'INSERT INTO personas(ID,NombreCompleto,Direccion,FechaNacimiento,CorreoElectronico) VALUES('.$IDDonante.',"'.$NombreCompleto.'","'.$Direccion.'","'.$FechaNacimiento.'","'.$CorreoElectronico.'")';

if (mysql_query($DBQuery,$DBConexion) === TRUE) {
    echo 'New record created successfully';
} else {
    echo 'Error: ' . $DBConexion->error;
}

$DBQuery = 'INSERT INTO donaciones(ID,IDDonante,IDAlmacen,Fecha,Hora,FactorRH,TipoDeSangre) VALUES('.$IDDonacion.','.$IDDonante.','.$IDAlmacen.',"'.$Fecha.'","'.$Hora.'",'.$FactorRH.',"'.$TipoDeSangre.'")';


if (mysql_query($DBQuery,$DBConexion) === TRUE) {
    echo 'New record created successfully';
} else {
    echo 'Error: ' . $DBConexion->error;
}

header ( 'Location: /principal.php' );
?>