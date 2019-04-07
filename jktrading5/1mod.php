<?php
require('./conexion.php');

$id=$_POST['id'];
$placa=$_POST['placa'];
$color=$_POST['color'];
$tonelaje=$_POST['tonelaje'];
$idtr=$_POST['idtran'];
$query="INSERT INTO camion (placa, color, tonelaje, idtransportadora) VALUES ('$placa','$color','$tonelaje','$idtr')";

$query="UPDATE camion SET placa='$placa',color='$color', tonelaje='$tonelaje', idtransportadora='$idtr' WHERE idcamion='$id'";

$resultado=$connect->query($query);

?>

<html>
    <head>
        <style>body{background: url(fondo.jpg)} </style>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=1camion.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>

