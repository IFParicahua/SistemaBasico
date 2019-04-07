<?php 
require ('./conexion.php');

$id=$_GET['idsilo'];

$query="SELECT * FROM silo where idsilo='$id'";
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
		<h1 style="color:rgb(79, 151, 207);">Register</h1>
                
		<div id="wrap-form" >
                    <form name="modificar_beneficiario" method="POST" action="mod_silo.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

			  <div class="form-group">
			    <label for="username">Nombre</label>
			    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre_silo']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Direccion</label>
			    <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion_silo']; ?>">
			  </div>
                    <input type="submit" value="guardar" class="btn btn-primary">
                   
		</form>
	</div> 
	</div>	

</body>
</html>
