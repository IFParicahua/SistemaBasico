<?php
require ('./conexion.php');
$query="SELECT idproducto, descripcion FROM producto where estado=1";
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
  <body><?php include("./menu.php"); ?>
 <div class="container" >
  <h2>Producto</h2>
  <p></p>            
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>Descripcion</th>
        <th>
            <a href="producto.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span></a>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['descripcion'];?></td>
        <td>
            <a href="prec.php?idproducto=<?php echo $row['idproducto']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
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