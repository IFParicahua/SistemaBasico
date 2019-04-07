<?php 
require ('./conexion.php');

$id=$_GET['iddestino'];

$query="SELECT * FROM destino where iddestino='$id'";
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
                    <form name="modificar_beneficiario" method="POST" action="dmod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

			  <div class="form-group">
			    <label for="username">Descripcion</label>
			    <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="username">Ciudad</label>
			    <input type="text" class="form-control" name="ciudad" value="<?php echo $row['ciudad']; ?>">
			  </div>
                    <input type="submit" value="guardar" class="btn btn-primary">
                    </div> 
                
                
		</form>
	
	</div>	

</body>
</html>