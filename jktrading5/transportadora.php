<?php
require ('./conexion.php');
$query="SELECT idtransportadora, nombre_transportadora, direccion_transportadora FROM transportadora where estado=0";
$resultado=$connect->query($query);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JKSystem</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>body{background: url(fondo.jpg)} </style>
</head>
  <body><?php include("./menu.php"); ?>
 <div class="container" >
  <h2>Transportadora</h2>
  <p></p>            
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['nombre_transportadora'];?></td>
        <td><?php echo $row['direccion_transportadora'];?></td>
        <td>
            <a href="teliminar.php?idtransportadora=<?php echo $row['idtransportadora']; ?>"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a>
            <a href="tmodificar.php?idtransportadora=<?php echo $row['idtransportadora']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modificar"><span class="glyphicon glyphicon-pencil"></span></a>
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
          <form  method="POST" action="tguardar.php">
			  <div class="form-group">
			    <label for="username">nombre</label>
			    <input type="text" class="form-control" name="nombre" >
			  </div>

			  <div class="form-group">
			    <label for="username">direccion</label>
			    <input type="text" class="form-control" name="direccion" >
			  </div>
              
			  <hr>
			<br>  
                        <button type="submit" class="btn btn-primary" name="enviar" value="registrar">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		</form>
      </div> 
      </div>
      
    </div>

  </div>

<!-- Editar -->
<div id="modificar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Edit content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registro</h4>
      </div>
      <div class="modal-body">
          <div>
              <?php include './tmodificar.php';?>
          </div>
      </div>
      
    </div>

  </div>

</div>      
    
  </body>
</html>