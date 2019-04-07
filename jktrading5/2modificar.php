<?php 
require ('./conexion.php');

$id=$_GET['idchofer'];

$query="SELECT * FROM chofer where idchofer='$id'";
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
		<h1 style="color:rgb(79, 151, 207);">Registro</h1>
                
		<div id="wrap-form" >
                    <form name="modificar_beneficiario" method="POST" action="2mod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

			  <div class="form-group">
			    <label for="username">CI</label>
			    <input type="text" class="form-control" name="ci" value="<?php echo $row['ci_chofer']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Nombre</label>
			    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre_chofer']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Direccion</label>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion_chofer']; ?>">
			  </div>

                          <div class="form-group">
			    <label for="username">Telefono</label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>">
			  </div>
                    <label>Transportadora</label>
			  <SELECT NAME="idtran">
                            <?php $sql="SELECT idtransportadora, nombre_transportadora FROM transportadora where estado=0;";
                            $res=$connect->query($sql);?>
                            <?php while ($row=$res->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idtransportadora'].'">'.$row['nombre_transportadora'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
                    <div class="form-group"></div>
                    <input type="submit" value="guardar" class="btn btn-primary">
		</form>
              </div> 
	</div>	
	</div>
</body>
</html>
