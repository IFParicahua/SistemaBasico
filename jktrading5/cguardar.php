<?php
require('./conexion.php');
$con=$_POST['ncontrato'];
$fecha=$_POST['fecha'];
$fecha = date("Y-m-d", strtotime($fecha));
$query="INSERT INTO contrato (ncontrato, fecha_contrato) VALUES ('$con','$fecha')";
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

