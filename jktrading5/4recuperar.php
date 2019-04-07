<?php
require ('./conexion.php');
$query="SELECT `boleta_pesaje`.`idboleta`,`boleta_pesaje`.`nboleta`, `chofer`.`nombre_chofer`, `camion`.`placa`, `silo`.`nombre_silo`, `producto`.`descripcion`, `destino`.`ciudad`, `contrato`.`ncontrato`, `boleta_pesaje`.`fecha_de_balanza`, `boleta_pesaje`.`merma`, `boleta_pesaje`.`peso_producto_salida`, `boleta_pesaje`.`peso_producto_llegada`, `boleta_pesaje`.`flete`, `boleta_pesaje`.`porcentaje`, `boleta_pesaje`.`fletexpeso`, `boleta_pesaje`.`fecha_salida`, `boleta_pesaje`.`fecha_llegada`
FROM `boleta_pesaje`
    LEFT JOIN `silo` ON `boleta_pesaje`.`idsilo` = `silo`.`idsilo`
    LEFT JOIN `chofer` ON `boleta_pesaje`.`idchofer` = `chofer`.`idchofer`
    LEFT JOIN `destino` ON `boleta_pesaje`.`iddestino` = `destino`.`iddestino`
    LEFT JOIN `camion` ON `boleta_pesaje`.`idcamion` = `camion`.`idcamion`
    LEFT JOIN `contrato` ON `boleta_pesaje`.`idcontrato` = `contrato`.`idcontrato`
    LEFT JOIN `producto` ON `boleta_pesaje`.`idproducto` = `producto`.`idproducto`
     where `boleta_pesaje`.`estado`=1";
$resultado=$connect->query($query);	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>body{background: url(fondo.jpg)} </style>
</head>
  <body><?php include("menu.php"); ?>
      <div class="container" >
  <h2>Boleta de pesaje</h2>
  <p></p>            
  <table class="table table-striped" style="background: white; width: 1200px;">
    <thead>
      <tr>
        <th>Numero</th>
        <th>chofer</th>
        <th>camion</th>
        <th>silo</th>
        <th>producto</th>
        <th>destino</th>
        <th>contrato</th>
        <th>fecha balanza</th>
        <th>merma</th>
        <th>peso salida</th>
        <th>peso llegada</th>
        <th>flete</th>
        <th>porcentaje</th>
        <th>flete peso</th>
        <th>fecha salida</th>
        <th>fecha llegada</th>
        <th>
            <a href="4boleta_pesaje.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></a>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
          <td><?php echo $row['nboleta'];?></td>
        <td><?php echo $row['nombre_chofer'];?></td>
        <td><?php echo $row['placa'];?></td>
        <td><?php echo $row['nombre_silo'];?></td>
        <td><?php echo $row['descripcion'];?></td>
        <td><?php echo $row['ciudad'];?></td>
        <td><?php echo $row['ncontrato'];?></td>       
        
        <td>        <?php $row['fecha_de_balanza']= date("d/m/Y", strtotime($row['fecha_de_balanza'])); ?></td>
        <td>
        <td><?php echo $row['merma'];?></td>
        <td><?php echo $row['peso_producto_salida'];?></td>
        <td><?php echo $row['peso_producto_llegada'];?></td>
        <td><?php echo $row['flete'];?></td>
        <td><?php echo $row['porcentaje'];?></td>
        <td><?php echo $row['fletexpeso'];?></td>
        <td>        <?php $row['fecha_salida']= date("d/m/Y", strtotime($row['fecha_salida'])); ?></td>
        <td>
        <?php $row['fecha_llegada']= date("d/m/Y", strtotime($row['fecha_llegada'])); ?></td>
        <td>
            <a href="4rec.php?idboleta=<?php echo $row['idboleta']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>     
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>