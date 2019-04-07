<?php 
require ('./conexion.php');

$id=$_GET['idpago'];

$query="SELECT `pago`.`idpago`, `boleta_pesaje`.`nboleta`, `beneficiario`.`nombre_beneficiario`, `pago`.`estado`, `pago`.`cheque`, `pago`.`modo`, `pago`.`fecha`, `pago`.`monto`
FROM `pago`
    LEFT JOIN `boleta_pesaje` ON `pago`.`idboleta` = `boleta_pesaje`.`idboleta`
    LEFT JOIN `beneficiario` ON `pago`.`idbeneficiario` = `beneficiario`.`idbeneficiario` where `idpago`='$id'";
$resultado=$connect->query($query);
$row=$resultado->fetch_assoc();
?>


<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body >

	<div class="container" style="width: 380px">
		<h1 style="color:rgb(79, 151, 207);">Modificar</h1>
                
		<div id="wrap-form" >
                    <form  method="POST" action="3mod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                    <div>
                        <label for="username">Estado</label>
                        <input type="text" class="form-control" name="estado" value="<?php echo $row['estado']; ?>">
                        
                    </div>
                    <div>
                        <label for="username">Cheque</label>
			<input type="text" class="form-control" name="cheque" value="<?php echo $row['cheque']; ?>">
                    </div>
                    <div>
                        <label for="username">Modo de pago</label>
			<input type="text" class="form-control" name="modo" value="<?php echo $row['modo']; ?>">
                    </div>
                    <div>
                        <label form="FePa">Fecha de Pago:</label>
                        <input type="date" class="form-control" id="FePa" placeholder="Ingresar Fecha de contrato" name="fecha" value="<?php echo $row['fecha']; ?>">  
                    </div>
                    <div>
                        <label for="username">Monto</label>
			<input type="text" class="form-control" name="monto" value="<?php echo $row['monto'];?>">
                    </div>
                    
                    
                    <div class="form-group">
			    <label for="username">Boleta</label>
			    <SELECT name="idboleta" >
                            <?php $sql="SELECT idboleta, nboleta FROM boleta_pesaje where estado=0";
                            $res=$connect->query($sql);?>
                            <?php while ($row=$res->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idboleta'].'">'.$row['nboleta'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>

                    <div class="form-group">
			    <label for="username">Beneficiario</label>
			    <SELECT name="idbe">
                            <?php $sql="SELECT idbeneficiario, nombre_beneficiario FROM beneficiario where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idbeneficiario'].'">'.$row['nombre_beneficiario'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </div>
			<br>  
                    <input type="submit" value="guardar" class="btn btn-primary">
                    
                
                
		</form>
</div> 	
	</div>	

</body>
</html>

