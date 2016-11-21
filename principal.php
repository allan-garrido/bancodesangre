<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Pagina principal</title>
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
<?php include 'application/check-login.php';?>
<h1>Pagina principal</h1>
<nav>
<ul>
  <li><a href="nueva-donacion.php">Nuevo Donante</a></li>
  <li><a href="ver-donaciones.php">Ver donaciones</a></li>
    <li><a href="application/logout.php">Salir</a></li>

</ul>
</nav>
</body>
</html>