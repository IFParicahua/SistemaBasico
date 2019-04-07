<?php
require('./conexion.php');

$id=$_POST['id'];
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$query="UPDATE beneficiario SET ci_beneficiario='$ci',nombre_beneficiario='$nombre', direccion_beneficiario='$direccion', telefono='$telefono' WHERE idbeneficiario='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=beneficiario.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
