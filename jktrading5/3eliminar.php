<?php
require('./conexion.php');

$id=$_GET['idpago'];

$query="UPDATE pago SET estado_eliminado=1 WHERE idpago='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <title>Guardar</title>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body background="fondo.jpg">

        <?php if($resultado>0){ ?>
            <meta http-equiv="Refresh" content="0.01;URL=3pago.php">
       <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>

    </body>
</html>