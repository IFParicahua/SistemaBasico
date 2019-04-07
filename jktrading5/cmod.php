<?php
require('./conexion.php');

$id=$_POST['id'];
$ncontrato=$_POST['ncontrato'];
$fecha=$_POST['fecha'];

$query="UPDATE contrato SET ncontrato='$ncontrato',fecha_contrato='$fecha' WHERE idcontrato='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=contrato.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
