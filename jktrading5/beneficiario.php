<?php
require ('./conexion.php');
$query="SELECT `idbeneficiario`,`ci_beneficiario`, `nombre_beneficiario`, `direccion_beneficiario`, `telefono`, `estado` FROM `beneficiario` WHERE `estado`=0 ";
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
  <h2>Beneficiario</h2>
  <p></p>            
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>CI</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['ci_beneficiario'];?></td>
        <td><?php echo $row['nombre_beneficiario'];?></td>
        <td><?php echo $row['direccion_beneficiario'];?></td>
        <td><?php echo $row['telefono'];?></td>
        <td>
            <a href="beliminar.php?idbeneficiario=<?php echo $row['idbeneficiario']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
            <a href="bmodificar.php?idbeneficiario=<?php echo $row['idbeneficiario']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-pencil"></span></a>
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
          <form role="form" name="nuevo_beneficiario" method="POST" action="bguardar.php">
			  <div class="form-group">
			    <label for="username">CI</label>
			    <input type="text" class="form-control" name="ci" >
			  </div>

			  <div class="form-group">
			    <label for="username">Nombre</label>
			    <input type="text" class="form-control" name="nombre" >
			  </div>

			  <div class="form-group">
			    <label for="username">Direccion</label>
                            <input type="text" class="form-control" name="direccion" >
			  </div>


			  <div class="form-group">
			    <label for="username">Telefono</label>
			    <input type="text" class="form-control" name="telefono">
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
              <?php include './bmodificar.php';?>
          </div>
      </div>
      
    </div>

  </div>

</div>      
    </body>
</html>