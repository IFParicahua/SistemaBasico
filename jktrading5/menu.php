<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JK</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="cssmenu/style.css" type="text/css" media="screen">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <style>
  li{ cursor:pointer;}
  .custom-file-input {
  visibility: hidden;
  width: 0;
  position: relative;
}
.custom-file-input::before {
	content: 'Importar Excel';
	display: inline-block;
  background: #fff url(../images/clouds-in-blue-sky.jpg)
  border:1px #000 solid;
	padding: 8px 20px;
	border-radius: 10px;
	outline: none;
	white-space: nowrap;
	-webkit-user-select: none;
	cursor: pointer;
	text-shadow: 1px 1px #fff;
	font-weight: 700;
	font-size: 12pt;
	visibility: visible;
	position: absolute;
	font-weight: bold;
	color: #e7e5e5;
	text-shadow: 0 2px 2px rgba(0,0,0, .7);
	font-style: inherit;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
  </style>
  
  </head>
  
<body>
<div >
    <ul id="nav">
        <li><a href="index.php"><font size="3">JK  Trading</font></a></li>
        <li><a><font size="3">Observaciones</font></a>
            <ul>
                <li><a href="beneficiario.php">Beneficiarios</a></li>
                <li><a href="destino.php">Destino</a></li>
                <li><a href="boleta.php">Boleta de pesaje</a></li>
                <li><a href="producto.php">Producto</a></li>
                <li><a href="silo.php">Silo</a></li>
                <li><a href="transportadora.php">Transportadora</a></li>
                <li><a href="1camion.php">Camion</a></li>
                <li><a href="2chofer.php">Chofer</a></li>
                <li><a href="3pago.php">Pago</a></li>
                <li><a href="contrato.php">Contrato</a></li>
            </ul>
        </li>
        <li style="width: 100px "> 
            <form action="listar_previa.php" method="post" target="_blank" id="loadfileexcel"  enctype="multipart/form-data" >
     
         <input class="custom-file-input" id="inputexcel" type="file" name="inputexcel" onchange="this.form.submit()" >
         </form>
	</li>
        
    </ul>
</div>
 <script src="js/jquery.min.js"></script>
 <script src="js/jquery.form.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 
</body>
</html>