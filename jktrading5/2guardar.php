<?php
require('./conexion.php');
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$idtr=$_POST['idtran'];
$query="INSERT INTO chofer( ci_chofer, nombre_chofer, direccion_chofer, telefono, idtransportadora) VALUES ('$ci','$nombre','$direccion','$telefono','$idtr')";
$resultado=$connect->query($query);
?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=2chofer.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
