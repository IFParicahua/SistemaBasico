<?php
require ('./conexion.php');
$query="SELECT idtransportadora, nombre_transportadora, direccion_transportadora FROM transportadora where estado=1";
$resultado=$connect->query($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>body{background: url(fondo.jpg)} </style>
</head>
  <body><?php include("./menu.php"); ?>
 <div class="container" >
  <h2>Transportadora</h2>
          
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>
            <a href="transportadora.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></a>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['nombre_transportadora'];?></td>
        <td><?php echo $row['direccion_transportadora'];?></td>
        <td>
            <a href="trec.php?idtransportadora=<?php echo $row['idtransportadora']; ?>"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a>
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