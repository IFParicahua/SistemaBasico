<?php
require('./conexion.php');

$id=$_GET['idboleta'];

$query="UPDATE boleta_pesaje SET estado=1 WHERE idboleta='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <title>Guardar</title>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body background="fondo.jpg">

        <?php if($resultado>0){ ?>
            <meta http-equiv="Refresh" content="0.01;URL=boleta.php">
       <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>

    </body>
</html>