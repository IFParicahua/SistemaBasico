<?php
require('./conexion.php');

$id=$_GET['iddestino'];

$query="UPDATE destino SET estado=1 WHERE iddestino='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <title>Guardar</title>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body background="fondo.jpg">

        <?php if($resultado>0){ ?>
            <meta http-equiv="Refresh" content="0.01;URL=destino.php">
       <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>

    </body>
</html>