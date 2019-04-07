<?php
require('./conexion.php');
$nbo=$_POST['nboleta'];
$idcho=$_POST['idchofer'];
$idca=$_POST['idcamion'];
$idsi=$_POST['idsilo'];
$iddes=$_POST['iddestino'];
$idcon=$_POST['idcontrato'];
$idprod=$_POST['idproducto'];
$fecha_b=$_POST['fecha_balanza'];
$fecha = date("Y-m-d", strtotime($fecha));
$merma=$_POST['merma'];
$p_salida=$_POST['peso_salida'];
$p_llegada=$_POST['peso_llegada'];
$flete=$_POST['flete'];
$porc=$_POST['porcentaje'];
$f_p=$_POST['flete_peso'];
$f_salida=$_POST['f_salida'];
$f_salida = date("Y-m-d", strtotime($f_salida));
$f_llegada=$_POST['f_llegada'];
$f_llegada = date("Y-m-d", strtotime($f_llegada));
$query="INSERT INTO boleta_pesaje(nboleta, idchofer, idcamion, idsilo, idproducto, fecha_de_balanza, merma, peso_producto_salida, peso_producto_llegada, flete, porcentaje, fletexpeso, idcontrato, iddestino, fecha_salida, fecha_llegada) VALUES ('$nbo','$idcho','$idca','$idsi','$idprod','$fecha_b','$merma','$p_salida','$p_llegada','$flete','$porc','$f_p','$idcon','$iddes','$f_salida','$f_llegada')";
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
