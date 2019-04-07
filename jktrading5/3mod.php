<?php
require('./conexion.php');

$id=$_POST['id'];
$monto=$_POST['monto'];
$fecha=$_POST['fecha'];
$modo=$_POST['modo'];
$cheque=$_POST['cheque'];
$estado=$_POST['estado'];
$idbeneficiario=$_POST['idbe'];
$idboleta=$_POST['idboleta'];

$query="UPDATE `pago` SET `monto`='$monto',`fecha`='$fecha',`modo`='$modo',`cheque`='$cheque',`estado`='$estado',`idbeneficiario`='$idbeneficiario',`idboleta`='$idboleta' WHERE `idpago`='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=3pago.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>
