<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ver donaciones</title>
<style>
nav{
    /*Bordes redondeados*/
    -webkit-border-radius:10px;/*Para chrome y Safari*/
    -moz-border-radius:10px;/*Para Firefox*/
    -o-border-radius:10px;/*Para Opera*/
    border-radius:10px;/*El estandar por defecto*/
    background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#CCC));/*Para chrome y Safari*/
    /*Degradados*/
    background-image: -moz-linear-gradient(top center, #FFF, #CCC);/*Para Firefox*/
    background-image: -o-linear-gradient(top, #FFF, #CCC);/*Para Opera*/
    background-image: linear-gradient(top, #FFF, #CCC);/*El estandar por defecto*/
    overflow:hidden;
    padding:10px;
    width:90%;
}
nav ul{
    list-style:none;
    margin:0 10px 0 10px;
    padding:0;
}

nav ul li{
    /*Bordes redondeados*/
    -webkit-border-radius:5px;/*Chrome y Safari*/
    -moz-border-radius:5px;/*Firefox*/
    -o-border-radius:5px;/*Opera*/
    border-radius:5px;/*Estandar por defecto*/
    float:left;
    font-family:Arial, Helvetica, sans-serif;
    font-size:16px;
    font-weight:bold;
    margin-right:10px;
    text-align:center;
    /*Sombras para texto, los mismos parametros que box-shadow*/
    text-shadow: 0px 1px 0px #FFF;
}

nav ul li:hover{
    /*Degradado de fondo*/
    background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to( #E3E3E3));/*Chrome y Safari*/
    background-image: -moz-linear-gradient(top center, #FFF, #E3E3E3);/*Firefox*/
    background-image: -o-linear-gradient(top, #FFF, #E3E3E3);/*Opera*/
    background-image: linear-gradient(top, #FFF, #E3E3E3);/*Estandar por defecto*/
    /*Sombras*/
    -webkit-box-shadow:  1px -1px 0px #999;/*Chrome y Safari*/
    -moz-box-shadow:  1px -1px 0px #999;/*Firefox*/
    -o-box-shadow:  1px -1px 0px #999;/*Opera*/
    box-shadow:  1px -1px 0px #999;/*Estandar por defecto*/
    border:1px solid #E3E3E3;
}

nav ul li a{
    color:#999;
    display:block;
    padding:10px;
    text-decoration:none;
    /*Transiciones*/
    -webkit-transition: 0.4s linear all;
    -moz-transition: 0.4s linear all;
    -o-transition: 0.4s linear all;
    transition: 0.4s linear all;
}

nav ul li a:hover {
    color:#000;
}
</style>
</head>

<body>
<?php include 'application/check-login.php'; ?>
<?php include 'application/basededatos.php'; ?>
<nav>
<ul>
  <li><a href="nueva-donacion.php">Nuevo donante</a></li>
  <li><a href="ver-donaciones.php">Ver donaciones</a></li>
  <li><a href="application/logout.php">Salir</a></li>
</ul>
</nav>
<h2>Ver donaciones</h2>
<table width="90%" border="1" cellpadding="2" cellspacing="0">
  <tbody>
    <tr>
      <td>ID Donante</td>
      <td>Peso</td>
      <td>Nombre completo</td>
      <td>Direccion</td>
      <td>Fecha de nacimiento</td>
      <td>Correo electronico</td>
      <td>ID Donacion</td>
      <td>Fecha</td>
      <td>Hora</td>
      <td>Factor RH</td>
      <td>Tipo de Sangre</td>
      <td>Almacen</td>
      <td>Puede donar</td>
      <td>Puede recibir</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
<?php
$DBQuery = 'SELECT * FROM donantes;';
$DBResultado = mysql_query($DBQuery,$DBConexion);

if (mysql_num_rows($DBResultado) > 0) {
	while ($Filas = mysql_fetch_assoc($DBResultado)){
		echo '<tr>';
			echo '<td>'.$Filas['ID'].'</td>';
			echo '<td>'.$Filas['Peso'].'</td>';
		
			$DBQuery2 = 'SELECT * FROM personas WHERE ID='.$Filas['ID'].';';
		
			$DBResultado2 = mysql_query($DBQuery2,$DBConexion);
		
			if(mysql_num_rows($DBResultado2) >0) {
				$Filas2 = mysql_fetch_assoc($DBResultado2);
				
				echo '<td>'.$Filas2['NombreCompleto'].'</td>';
				echo '<td>'.$Filas2['Direccion'].'</td>';
				echo '<td>'.$Filas2['FechaNacimiento'].'</td>';
				echo '<td>'.$Filas2['CorreoElectronico'].'</td>';
			}
			
			$DBQuery3 = 'SELECT * FROM donaciones WHERE IDDonante='.$Filas['ID'].';';
			
			$DBResultado3 = mysql_query($DBQuery3,$DBConexion);
			if(mysql_num_rows($DBResultado3) >0) {
				$Filas3 = mysql_fetch_assoc($DBResultado3);
				echo '<td>'.$Filas3['ID'].'</td>';
				echo '<td>'.$Filas3['Fecha'].'</td>';
				echo '<td>'.$Filas3['Hora'].'</td>';
				echo '<td>'.$Filas3['FactorRH'].'</td>';
				echo '<td>'.$Filas3['TipoDeSangre'].'</td>';
				
				$DBQuery4 = 'SELECT * FROM almacenes WHERE ID='.$Filas3['IDAlmacen'].';';
	
				$DBResultado4 = mysql_query($DBQuery4,$DBConexion);
	
				if(mysql_num_rows($DBResultado4) >0) {
					$Filas4 = mysql_fetch_assoc($DBResultado4);
					echo '<td>'.$Filas4['Nombre'].'</td>';			
				}
		}

                if($Filas3['FactorRH']==1) {
                        switch($Filas3['TipoDeSangre']) {
                                case 'A': case 'a':
                                          echo '<td>A+, AB+</td><td>O+, A+, O-, A-</td>';
                                          break;
                                case 'B': case 'b':
                                          echo '<td>B+, AB+</td><td>O+, B+, O-, B-</td>';
                                          break;
                                case 'AB': case 'ab':
                                          echo '<td>AB+</td><td>Todos</td>';
                                          break;
                                case 'O': case 'o':
                                          echo '<td>A+, O+, B+, AB+</td><td>O+, O-</td>';
                                          break;
                        }
                } else {
                        switch($Filas3['TipoDeSangre']) {
                                case 'A': case 'a':
                                          echo '<td>A+, AB+, A-, AB-</td><td>O-, A-</td>';
                                          break;
                                case 'B': case 'b':
                                          echo '<td>B+, AB+, B-, AB-</td><td>O-, B-</td>';
                                          break;
                                case 'AB': case 'ab':
                                          echo '<td>AB+, AB-</td><td>AB-, A-, O-, B-</td>';
                                          break;
                                case 'O': case 'o':
                                          echo '<td>Todos</td><td>O-</td>';
                                          break;
                        }
                }
	echo '</tr>';
	}
}
?>
  </tbody>
</table>
</body>
</html>
<?php
mysql_close($DBConexion);
?>	