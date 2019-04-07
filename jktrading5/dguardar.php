<?php
require('./conexion.php');
$des=$_POST['destino'];
$ciu=$_POST['ciudad'];
$query="INSERT INTO destino(descripcion, ciudad) VALUES ('$des','$ciu')";
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
