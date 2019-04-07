<?php 
require ('./conexion.php');

$id=$_GET['idtransportadora'];

$query="SELECT nombre_transportadora, direccion_transportadora FROM transportadora where idtransportadora='$id'";
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
                    <form name="modificar_beneficiario" method="POST" action="tmod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

			  <div class="form-group">
			    <label for="username">Nombre</label>
			    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre_transportadora']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Direccion</label>
			    <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion_transportadora']; ?>">
			  </div>

			  <hr>
			<br>  
                        <input type="submit" value="guardar" class="btn btn-primary">
		</form> 
                </div>
	</div>	

</body>
</html>
