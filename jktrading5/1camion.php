<?php
require ('./conexion.php');
$query="SELECT `camion`.`idcamion`,`transportadora`.`nombre_transportadora`, `camion`.`tonelaje`, `camion`.`color`, `camion`.`placa`,`camion`.`estado`
FROM `camion`
    LEFT JOIN `transportadora` ON `camion`.`idtransportadora` = `transportadora`.`idtransportadora` WHERE `camion`.`estado`=0";
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
  <h2>Camion</h2>
  <p></p>            
  <table class="table table-striped" style="background: white">
    <thead>
      <tr>
        <th>Transportadora</th>
        <th>Tonelaje</th>
        <th>Color</th>
        <th>Placa</th>
        <th>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
        </th>
      </tr>
    </thead>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['nombre_transportadora'];?></td>
        <td><?php echo $row['tonelaje'];?></td>
        <td><?php echo $row['color'];?></td>
        <td><?php echo $row['placa'];?></td>
        <td>
            <a href="1eliminar.php?idcamion=<?php echo $row['idcamion']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
            <a href="1modificar.php?idcamion=<?php echo $row['idcamion']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-pencil"></span></a>
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
          <form role="form" name="nuevo_beneficiario" method="POST" action="1guardar.php">
			  <div class="form-group">
			    <label for="username">Placa</label>
			    <input type="text" class="form-control" name="placa" >
			  </div>

			  <div class="form-group">
			    <label for="username">Color</label>
			    <input type="text" class="form-control" name="color" >
			  </div>

			  <div class="form-group">
			    <label for="username">Tonelaje</label>
                            <input type="text" class="form-control" name="tonelaje" >
			  </div>
                          
                        <div class="form-group">
			    <label for="username">Transportadora</label>
                          <SELECT NAME="idtran">
                            <?php $sql="SELECT idtransportadora, nombre_transportadora FROM transportadora where estado=0;";
                            $res=$connect->query($sql);?>
                            <?php while ($row=$res->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idtransportadora'].'">'.$row['nombre_transportadora'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
                        </div>
			<br>  
                        <button type="submit" class="btn btn-primary" name="enviar" value="registrar">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
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
              <?php include './1modificar.php';?>
          </div>
      </div>
      
    </div>

  </div>

</div>      
    
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>