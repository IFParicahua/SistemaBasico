<?php
require ('./conexion.php');
$query="SELECT idcontrato, ncontrato, fecha_contrato FROM contrato where estado=0";
$resultado=$connect->query($query);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JKSystem</title>

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
  <h2>Contrato</h2>
  <p></p>            
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>Numero de contrato</th>
        <th>Fecha</th>
        <th>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['ncontrato'];?></td>
        
         <td>        <?php echo $row['fecha_contrato']= date("d/m/Y", strtotime($row['fecha_contrato'])); ?></td>
        <td>
            <a href="celiminar.php?idcontrato=<?php echo $row['idcontrato']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
            <a href="cmodificar.php?idcontrato=<?php echo $row['idcontrato']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-pencil"></span></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>  
      
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registro</h4>
      </div>
      <div class="modal-body">
          <form role="form" name="nuevo_beneficiario" method="POST" action="cguardar.php">
			  <div class="form-group">
			    <label for="username">Numero de contrato</label>
			    <input type="text" class="form-control" name="ncontrato" >
			  </div>

                        <div class="form-group">
                            <label form="FeCon">Fecha de contrato:</label>
                            <input type="date" class="form-control" id="FeCon" placeholder="Ingresar Fecha de contrato" name="fecha">  
                        </div>
			<br>  
                        <button type="submit" class="btn btn-primary" name="enviar" value="registrar">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		</form>
      </div> 
      </div>
      
    </div>

  </div>

<!-- Editar -->
<div id="editar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Edit content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registro</h4>
      </div>
      <div class="modal-body">
          <div>
              <?php include './cmodificar.php';?>
          </div>
      </div>
      
    </div>

  </div>

</div> 
  </body>
</html>
