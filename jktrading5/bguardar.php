<?php
require('./conexion.php');
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$query="INSERT INTO beneficiario(ci_beneficiario, nombre_beneficiario, direccion_beneficiario, telefono) VALUES ('$ci','$nombre','$direccion','$telefono')";
$resultado=$connect->query($query);
?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.55;URL=beneficiario.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>