<?php 
require('./conexion.php');
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];

$query="INSERT INTO transportadora (nombre_transportadora, direccion_transportadora) VALUES  ('$nombre', '$direccion')"; 
$resultado=$connect->query($query);
?>

<html>
    <head>
    </head>
    <body>
    <center>
        <?php if($resultado>0){ ?>
        <meta http-equiv="Refresh" content="0.1;URL=transportadora.php">
        <?php }else{ ?>
           <h1>Error al guardar </h1>
        <?php } ?>
    </center>
    </body>
</html>



