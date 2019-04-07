<?php
require('./conexion.php');

$id=$_POST['id'];
$nbo=$_POST['nboleta'];
$fecha_b=$_POST['fecha_balanza'];
$merma=$_POST['merma'];
$p_salida=$_POST['peso_salida'];
$p_llegada=$_POST['peso_llegada'];
$flete=$_POST['flete'];
$porc=$_POST['porcentaje'];
$f_p=$_POST['flete_peso'];
$f_salida=$_POST['f_salida'];
$f_llegada=$_POST['f_llegada'];
$idcho=$_POST['idchofer'];
$idca=$_POST['idcamion'];
$idsi=$_POST['idsilo'];
$iddes=$_POST['iddestino'];
$idcon=$_POST['idcontrato'];
$idprod=$_POST['idproducto'];

$query="UPDATE `boleta_pesaje` SET `nboleta`='$nbo',`idchofer`='$idcho',`idcamion`='$idca',`idsilo`='$idsi',`idproducto`='$idprod',`fecha_de_balanza`='$fecha_b',`merma`='$merma',`peso_producto_salida`='$p_salida',`peso_producto_llegada`='$p_llegada',`flete`='$flete',`porcentaje`='$porc',`fletexpeso`='$f_p',`idcontrato`='$idcon',`iddestino`='$iddes',`fecha_salida`='$f_salida',`fecha_llegada`='$f_llegada' where `idboleta`='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
           <meta http-equiv="Refresh" content="0.1;URL=boleta.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
