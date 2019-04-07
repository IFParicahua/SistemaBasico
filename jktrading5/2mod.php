<?php
require('./conexion.php');

$id=$_POST['id'];
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$idtr=$_POST['idtran'];
$query="UPDATE `chofer` SET `ci_chofer`='$ci',`nombre_chofer`='$nombre',`direccion_chofer`='$direccion',`telefono`='$telefono',`idtransportadora`='$idtr' WHERE `idchofer`='$id'";

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
