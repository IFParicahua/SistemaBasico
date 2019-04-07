<?php
require('./conexion.php');

$id=$_POST['id'];
$descripcion=$_POST['descripcion'];
$ciudad=$_POST['ciudad'];

$query="UPDATE destino SET descripcion='$descripcion',ciudad='$ciudad' WHERE iddestino='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=destino.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
