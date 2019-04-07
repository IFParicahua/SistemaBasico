<?php
require ('./conexion.php');
$query="SELECT `pago`.`idpago`, `boleta_pesaje`.`nboleta`, `beneficiario`.`nombre_beneficiario`, `pago`.`estado`, `pago`.`cheque`, `pago`.`modo`, `pago`.`fecha`, `pago`.`monto`
FROM `pago`
    LEFT JOIN `boleta_pesaje` ON `pago`.`idboleta` = `boleta_pesaje`.`idboleta`
    LEFT JOIN `beneficiario` ON `pago`.`idbeneficiario` = `beneficiario`.`idbeneficiario`
     where `pago`.`estado_eliminado`=1";
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
    <script src="https://ajx.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>body{background: url(fondo.jpg)} </style>
</head>
  <body><?php include("./menu.php"); ?>
 <div class="container" >
  <h2>Pago</h2>
  <p></p>            
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>boleta</th>
        <th>beneficiario</th>
        <th>estado</th>
        <th>cheque</th>
        <th>modo</th>
        <th>fecha</th>
        <th>monto</th>
        <th>
            <a href="3pago.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></a>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['nboleta'];?></td>
        <td><?php echo $row['nombre_beneficiario'];?></td>
        <td><?php echo $row['estado'];?></td>
        <td><?php echo $row['cheque'];?></td>
        <td><?php echo $row['modo'];?></td>
        <td><?php $row['fecha']= date("d-m-Y", strtotime($row['fecha'])); ?></td>
        <td><?php echo $row['monto'];?></td>
        <td>
            <a href="3rec.php?idpago=<?php echo $row['idpago']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
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