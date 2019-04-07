<?php 
require ('./conexion.php');

$id=$_GET['idcamion'];

$query="SELECT `camion`.`idcamion`,`transportadora`.`nombre_transportadora`, `camion`.`tonelaje`, `camion`.`color`, `camion`.`placa`
FROM `camion`
    LEFT JOIN `transportadora` ON `camion`.`idtransportadora` = `transportadora`.`idtransportadora` where `camion`.`idcamion`='$id'";
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
                    <form name="modificar_beneficiario" method="POST" action="1mod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

			  <div class="form-group">
			    <label for="username">Placa</label>
			    <input type="text" class="form-control" name="placa" value="<?php echo $row['placa']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Color</label>
			    <input type="text" class="form-control" name="color" value="<?php echo $row['color']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Tonelaje</label>
                            <input type="text" class="form-control" name="tonelaje" value="<?php echo $row['tonelaje']; ?>">
			  </div>
                          
                        <div class="form-group">
			    <label for="username">Transportadora</label>
                          <SELECT NAME="idtran" >
                            <?php $sql="SELECT idtransportadora, nombre_transportadora FROM transportadora where estado=0;";
                            $res=$connect->query($sql);?>
                            <?php while ($row=$res->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idtransportadora'].'">'.$row['nombre_transportadora'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
                        </div>
                    
                    <input type="submit" value="guardar" class="btn btn-primary">
                     
		</form>
	</div>
	</div>	
	</div>
</body>
</html>
