<?php
require('./conexion.php');
$d=$_POST['descripcion'];
$query="INSERT INTO producto(descripcion) VALUES ('$d')";
$resultado=$connect->query($query);
?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=producto.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
