<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nueva Donacion</title>
</head>

<body>
<?php include 'application/check-login.php';?>
<h1>Nueva Donacion</h1>
<form action="application/nueva-donacion.php" method="post" name="NuevaDonacion" id="NuevaDonacion">
  <?php include 'application/basededatos.php';?>
  <?php 
  $DBQuery = 'SELECT ID FROM donantes ORDER BY ID DESC LIMIT 1;';
  
  $DBResultado = $DBConexion->query ( $DBQuery );
  
  if ($DBResultado->num_rows > 0) {
	$Filas = $DBResultado->fetch_array ( MYSQLI_ASSOC );	
  }  
  ?>
  <h2>Datos del donante</h2>
  <label for="IDDonante">ID Donante:</label>  
  <input name="IDDonante" type="text" id="IDDonante" readonly value="<?php echo $Filas['ID']+1 ?>">
  <br>  
  <label for="NombreCompleto">Nombre completo:</label>
  <input name="NombreCompleto" type="text" required="required" id="NombreCompleto"><br>
  <label for="FechaNacimiento">Fecha de nacimiento:</label>
  <input name="FechaNacimiento" type="date" required="required" id="FechaNacimiento"><br>
  <label for="Direccion">Direccion:</label>
  <input name="Direccion" type="text" required="required" id="Direccion"><br>
  <label for="CorreoElectronico">Correo electronico:</label>
  <input name="CorreoElectronico" type="email" required="required" id="CorreoElectronico"><br>
  <label for="Peso">Peso en kilos:</label>
  <input name="Peso" type="number" required="required" id="Peso" max="100" min="1"><br>
  <h2>Datos sanguineos</h2>
  <?php 
  $DBQuery = 'SELECT ID FROM donaciones ORDER BY ID DESC LIMIT 1;';
  
  $DBResultado = $DBConexion->query ( $DBQuery );
  
  if ($DBResultado->num_rows > 0) {
	$Filas = $DBResultado->fetch_array ( MYSQLI_ASSOC );	
  }  
  ?>
  <label for="IDDonacion">ID Donacion:</label>
  <input name="IDDonacion" type="text" id="IDDonacion" value="<?php echo $Filas['ID']+1 ?>" readonly><br>
  <label for="Fecha">Fecha:</label>
  <input name="Fecha" type="date" id="Fecha" value="<?php echo date('Y-m-d'); ?>" readonly><br>
  <label for="Hora">Hora:</label>
  <input name="Hora" type="time"id="Hora" value="<?php echo date('H:m:s'); ?>" readonly><br>
    <label>Factor RH
      <input name="FactorRH" type="radio" required="required" id="FactorRH" value="1">
      Positivo</label>
    <br>
    <label>Factor RH
      <input name="FactorRH" type="radio" required="required" id="FactorRH" value="0">
      Negativo</label><br>
      <label for="TipoDeSangre">Tipo de sangre:</label>
      <select name="TipoDeSangre" required id="TipoDeSangre">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="O">O</option>
        <option value="AB">AB</option>
      </select><br>
      <label for="IDAlmacen">Almacen:</label>
      <select name="IDAlmacen" id="IDAlmacen">
      <?php
	  $DBQuery = 'SELECT ID,Nombre FROM almacenes;';

	  $DBResultado = $DBConexion->query ( $DBQuery );

	  if ($DBResultado->num_rows > 0) {
	  	while ($Filas = $DBResultado->fetch_assoc()){
			echo '<option value="'.$Filas['ID'].'">'.$Filas['Nombre'].'</option>	';
	   	}
	  }
	  ?>
      </select>
      <br>
      <input name="submit" type="submit" id="submit" value="Enviar"><input name="Cancelar" type="button" autofocus id="Cancelar" value="Cancelar" onclick="window.location='/bancodesangre/principal.php';return false;">
</form>
</body>
</html>
