<?php
require('./conexion.php');
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$query="INSERT INTO silo(nombre_silo, direccion_silo) VALUES ('$nombre','$direccion')";
$resultado=$connect->query($query);
?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.55;URL=silo.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
