<?php 
require ('./conexion.php');

$id=$_GET['idbeneficiario'];

$query="SELECT * FROM beneficiario where idbeneficiario='$id'";
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
                    <form name="modificar_beneficiario" method="POST" action="bmod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                         <div class="form-group">
			    <label for="username">CI</label>
			    <input type="text" class="form-control" name="ci" value="<?php echo $row['ci_beneficiario']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Nombre</label>
			    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre_beneficiario']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Direccion</label>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion_beneficiario']; ?>">
			  </div>


			  <div class="form-group">
			    <label for="username">Telefono</label>
			    <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>">
			  </div>
                    
                    <input type="submit" value="guardar" class="btn btn-primary">
                    </div> 
                
                
		</form>
	
	</div>	

</body>
</html>