<?php
require ('./conexion.php');
$query="SELECT `pago`.`idpago`, `boleta_pesaje`.`nboleta`, `beneficiario`.`nombre_beneficiario`, `pago`.`estado`, `pago`.`cheque`, `pago`.`modo`, `pago`.`fecha`, `pago`.`monto`
FROM `pago`
    LEFT JOIN `boleta_pesaje` ON `pago`.`idboleta` = `boleta_pesaje`.`idboleta`
    LEFT JOIN `beneficiario` ON `pago`.`idbeneficiario` = `beneficiario`.`idbeneficiario`
     where `pago`.`estado_eliminado`=0";
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
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
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
        <td> <?php echo $row['fecha']= date("d-m-Y", strtotime($row['fecha'])); ?> </td>
        <td><?php echo $row['monto'];?></td>
        <td>
            <a href="3eliminar.php?idpago=<?php echo $row['idpago']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
            <a href="3modificar.php?idpago=<?php echo $row['idpago']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-pencil"></span></a>
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
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registro</h4>
      </div>
      <div class="modal-body" >
          <form role="form" name="nuevo_beneficiario" method="POST" action="3guardar.php">
			  
                          <div class="form-group">
			    <label for="username">Boleta</label>
			    <SELECT NAME="idboleta">
                            <?php $sql="SELECT idboleta, nboleta FROM boleta_pesaje where estado=0";
                            $res=$connect->query($sql);?>
                            <?php while ($row=$res->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idboleta'].'">'.$row['nboleta'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>

			  <div class="form-group">
			    <label for="username">Beneficiario</label>
			    <SELECT NAME="idbe">
                            <?php $sql="SELECT idbeneficiario, nombre_beneficiario FROM beneficiario where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idbeneficiario'].'">'.$row['nombre_beneficiario'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>

			  <div class="form-group">
			    <label for="username">Estado</label>
			    <input type="text" class="form-control" name="estado">
                          </div>
                          
                          <div class="form-group">
			    <label for="username">Cheque</label>
			    <input type="text" class="form-control" name="cheque">
			  </div>
                          
                          <div class="form-group" >
			    <label for="username">Modo de pago</label>
			    <input type="text" class="form-control" name="modo">
			  </div>
                          
                          <div class="form-group" style="width: 180px">
                            <label form="FePa">Fecha de Pago:</label>
                            <input type="date" class="form-control" id="FePa" placeholder="Ingresar Fecha de contrato" name="fecha">  
                        
			    <label for="username">Monto</label>
			    <input type="text" class="form-control" name="monto">
			  </div>
			<br>  
                        <button type="submit" class="btn btn-primary" name="enviar" value="registrar">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		</form>
      </div>
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
              <?php include './3modificar.php';?>
          </div>
      </div>
      
    </div>

  </div>

</div>      
       
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
  </body>
</html>