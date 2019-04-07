<?php
require('./conexion.php');
$monto=$_POST['monto'];
$fecha=$_POST['fecha'];
$fecha = date("Y-m-d", strtotime($fecha));
$modo=$_POST['modo'];
$cheque=$_POST['cheque'];
$estado=$_POST['estado'];
$idbeneficiario=$_POST['idbe'];
$idboleta=$_POST['idboleta'];
$query="INSERT INTO pago (monto, fecha, modo, cheque, estado, idbeneficiario, idboleta) VALUES ('$monto','$fecha','$modo','$cheque','$estado','$idbeneficiario','$idboleta')";
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


