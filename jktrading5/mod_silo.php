<?php
require('./conexion.php');

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];

$query="UPDATE silo SET nombre_silo='$nombre',direccion_silo='$direccion' WHERE idsilo='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=silo.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
