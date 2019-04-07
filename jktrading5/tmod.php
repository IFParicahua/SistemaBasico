<?php
require('./conexion.php');

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];

$query="UPDATE transportadora SET nombre_transportadora='$nombre',direccion_transportadora='$direccion' WHERE idtransportadora='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=transportadora.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
