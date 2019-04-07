<?php 
require ('./conexion.php');

$id=$_GET['idcontrato'];

$query="SELECT * FROM contrato where idcontrato='$id'";
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
                    <form name="modificar_beneficiario" method="POST" action="cmod.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                           <div class="form-group">
			    <label for="username">Numero de contrato</label>
			    <input type="text" class="form-control" name="ncontrato" value="<?php echo $row['ncontrato']; ?>">
			  </div>

                        <div class="form-group">
                            <label form="FeCon">Fecha de contrato:</label>
                            <input type="date" class="form-control" id="FeCon" placeholder="Ingresar Fecha de contrato" name="fecha" value="<?php echo $row['fecha_contrato']; ?>">  
                        </div> 

                    <input type="submit" value="guardar" class="btn btn-primary">
                   <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
		</form>
	 </div> 
	</div>	

</body>
</html>