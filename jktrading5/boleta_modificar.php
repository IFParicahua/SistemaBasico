<?php 
require ('./conexion.php');

$id=$_GET['idboleta'];

$query="SELECT `boleta_pesaje`.`idboleta`,`boleta_pesaje`.`nboleta`, `chofer`.`nombre_chofer`, `camion`.`placa`, `silo`.`nombre_silo`, `producto`.`descripcion`, `destino`.`ciudad`, `contrato`.`ncontrato`, `boleta_pesaje`.`fecha_de_balanza`, `boleta_pesaje`.`merma`, `boleta_pesaje`.`peso_producto_salida`, `boleta_pesaje`.`peso_producto_llegada`, `boleta_pesaje`.`flete`, `boleta_pesaje`.`porcentaje`, `boleta_pesaje`.`fletexpeso`, `boleta_pesaje`.`fecha_salida`, `boleta_pesaje`.`fecha_llegada`
FROM `boleta_pesaje`
    LEFT JOIN `silo` ON `boleta_pesaje`.`idsilo` = `silo`.`idsilo`
    LEFT JOIN `chofer` ON `boleta_pesaje`.`idchofer` = `chofer`.`idchofer`
    LEFT JOIN `destino` ON `boleta_pesaje`.`iddestino` = `destino`.`iddestino`
    LEFT JOIN `camion` ON `boleta_pesaje`.`idcamion` = `camion`.`idcamion`
    LEFT JOIN `contrato` ON `boleta_pesaje`.`idcontrato` = `contrato`.`idcontrato`
    LEFT JOIN `producto` ON `boleta_pesaje`.`idproducto` = `producto`.`idproducto` where `boleta_pesaje`.`idboleta`='$id'";
$resultado=$connect->query($query);
$row=$resultado->fetch_assoc();
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body >

	<div class="container" style="width: 1000px">
		<h1 style="color:rgb(79, 151, 207);">Register</h1>
                
		<div id="wrap-form" >
                    <form name="modificar_beneficiario" method="POST" action="4mod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

			  <table class="table table-striped" style="background: white; width: 560px;">  
                          <th>
                          <div class="form-group">
			    <label for="username">Numero de boleta</label>
			    <input type="text" class="form-control" name="nboleta" value="<?php echo $row['nboleta']; ?>">
			  </div>
                         
                        <div class="form-group">
                            <label form="FeBa">Fecha de Balanza:</label>
                            <input type="date" class="form-control" placeholder="Ingresar Fecha de contrato" name="fecha_balanza" value="<?php echo $row['fecha_de_balanza']; ?>">  
                        </div>
                         
                        <div class="form-group">
			    <label for="username">Merma</label>
			    <input type="text" class="form-control" name="merma" value="<?php echo $row['merma']; ?>">
			  </div>
                        
                          <div class="form-group">
			    <label for="username">Peso salida</label>
			    <input type="text" class="form-control" name="peso_salida" value="<?php echo $row['peso_producto_salida']; ?>">
			  </div>      
                        
			  <div class="form-group">
			    <label for="username">Peso llegada</label>
			    <input type="text" class="form-control" name="peso_llegada"value="<?php echo $row['peso_producto_llegada']; ?>">
			  </div>
                        
                            <div class="form-group">
			    <label for="username">Flete</label>
			    <input type="text" class="form-control" name="flete" value="<?php echo $row['flete']; ?>">
			  </div>
                          
                        </th>
                        <th>
                          
                        
                           <div class="form-group">
			    <label for="username">Porcentaje</label>
			    <input type="text" class="form-control" name="porcentaje" value="<?php echo $row['porcentaje']; ?>">
			  </div>
                        
                           <div class="form-group">
			    <label for="username">Flete peso</label>
			    <input type="text" class="form-control" name="flete_peso" value="<?php echo $row['fletexpeso']; ?>">
			  </div>
                    
                          <div class="form-group">
                            <label form="FeSa">Fecha de salida:</label>
                            <input type="date" class="form-control" placeholder="Ingresar Fecha de salida" name="f_salida" value="<?php echo $row['fecha_salida']; ?>">  
                        </div>
                        
                           <div class="form-group">
                            <label form="FeLL">Fecha de llegada:</label>
                            <input type="date" class="form-control" placeholder="Ingresar Fecha de llegada" name="f_llegada" value="<?php echo $row['fecha_llegada']; ?>">  
			  </div>
                            
                          <div class="form-group">
			    <label for="username">Chofer</label>
			    <SELECT name="idchofer">
                            <?php $sql="SELECT idchofer, nombre_chofer FROM chofer where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idchofer'].'">'.$row['nombre_chofer'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
                            
			    <label for="username">Camion</label>
			    <SELECT name="idcamion">
                            <?php $sql="SELECT idcamion, placa FROM camion where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idcamion'].'">'.$row['placa'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>
                        
                        <div class="form-group">
			    <label for="username">Silo</label>
                            <SELECT name="idsilo">
                            <?php $sql="SELECT idsilo, nombre_silo FROM silo where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idsilo'].'">'.$row['nombre_silo'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>
                  
                        <div class="form-group">
			    <label for="username">Destino</label>
			    <SELECT name="iddestino">
                            <?php $sql="SELECT iddestino, descripcion, ciudad FROM destino where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['iddestino'].'">'.$row['descripcion'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>
                        
                        <div class="form-group">
			    <label for="username">Contrato</label>
			    <SELECT name="idcontrato">
                            <?php $sql="SELECT idcontrato, ncontrato FROM contrato where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idcontrato'].'">'.$row['ncontrato'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
                            
			    <label for="username">Producto</label>
			    <SELECT name="idproducto">
                            <?php $sql="SELECT idproducto, descripcion FROM producto where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idproducto'].'">'.$row['descripcion'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>
                                          
                         </th>
            </table>
                    <input type="submit" value="guardar" class="btn btn-primary">
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		</form>
	</div> 
	</div>	

</body>
</html>