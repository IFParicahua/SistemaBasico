<?php
require_once ('./conexion.php');
require_once ('./boleta_select.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JKSystem</title>
    <!-- Bootstrap -->
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
  body{background: url(fondo.jpg)} 
  table {
  border-collapse: collapse;
  width: 100%;
  }
	
  </style>

</head>
  <body><?php include("menu.php"); ?>
      <div class="container" >
  <h2>Boleta de pesaje</h2>
  <p></p>            
  <table class="table table-striped" style="background: white; width: 1200px;">
    <thead>
      <tr style=" 
  text-align: center;
  font-size: 15px; " >
        <th style ="width:70px ; white-space: nowrap;">Nro Boleta</th>
        <th>Chofer</th>
        <th>Camion</th>
        <th>Silo</th>
        <th>Producto</th>
        <th>Destino</th>
        <th>Contrato</th>
        <th >Fecha Balanza</th>
        <th>Merma</th>
        <th>Peso salida</th>
        <th>Peso llegada</th>
        <th>Flete</th>
        <th>Anticipo %</th>
        <th>Monto Total</th>
        <th>Fecha Salida</th>
        <th>Fecha Llegada</th>
        <th>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
        </th>
      </tr>
    </thead>
	<div id="contenedor">
    <div id="datos">
    <tbody style="font-size: 12px;">
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
          <td style ="width:70px"><?php echo $row['nboleta'];?></td>
        <td><?php echo $row['nombre_chofer'];?></td>
        <td style="white-space: nowrap;" ><?php echo $row['placa'];?></td>
        <td><?php echo $row['nombre_silo'];?></td>
        <td><?php echo $row['descripcion'];?></td>
        <td><?php echo $row['ciudad'];?></td>
        <td><?php echo $row['ncontrato'];?></td>       
        <td>        <?php echo $row['fecha_de_balanza']= date("d/m/Y", strtotime($row['fecha_de_balanza'])); ?></td>
        <td><?php echo $row['merma'];?></td>
        <td><?php echo $row['peso_producto_salida'];?></td>
        <td><?php echo $row['peso_producto_llegada'];?></td>
        <td><?php echo $row['flete'];?></td>
        <td><?php echo ($row['porcentaje'])*100;?></td>
        <td><?php echo $row['fletexpeso'];?></td>
        <td>        <?php if(is_null($row['fecha_salida'])){
			echo '-';
		}else{ 
		echo $row['fecha_salida']= date("d/m/Y", strtotime($row['fecha_salida']));} ?></td>
        <td>
        <?php if(is_null($row['fecha_salida'])){
			echo '-';
		}else{ 
		echo $row['fecha_llegada']= date("d/m/Y", strtotime($row['fecha_llegada'])); }?></td>
        <td>
            <a href="4eliminar.php?idboleta=<?php echo $row['idboleta']; ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></button></a>
            <a href="boleta_modificar.php?idboleta=<?php echo $row['idboleta']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-pencil"></span></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    </div>
	</div>
  </table>
</div>     
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 650px ">
      <div style="padding-top:15px;padding-left:15px;padding-right:15px" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Registro de Boleta</h3>
      </div>
      <div class="modal-body">
          <form role="form" id="boleta_guardar" name="boleta_guardar" action="boleta_guardar.php" method="POST">
            <table class="" style="background: white; width: 600px;">  
              <tr style="padding:3px">
              <td>           
			    <label for="username">N&uacute;mero de boleta</label>
			    <br>
                <input type="text" class="form-control" style="width:200px" name="nboleta" >
			  </td>
			  <td>
			    <label for="username">Chofer</label><br>
			    <SELECT NAME="idchofer">
                            <?php $sql="SELECT idchofer, nombre_chofer FROM chofer where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idchofer'].'">'.$row['nombre_chofer'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			    </td>
                </tr>
                 <tr>
              <td>
                <label for="username">Placa de Cami&oacute;n</label><br>
			    <SELECT NAME="idcamion">
                            <?php $sql="SELECT idcamion, placa FROM camion where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idcamion'].'">'.$row['placa'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </td>
              <td>
			    <label for="username">Silo</label><br>
                            <SELECT NAME="idsilo">
							
                            <?php $sql="SELECT idsilo, nombre_silo FROM silo where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idsilo'].'">'.$row['nombre_silo'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			 </td>
                </tr>
                       <tr>
              <td>
			    <label for="username">Destino</label><br>
			    <SELECT NAME="iddestino">
										
                            <?php $sql="SELECT iddestino, descripcion, ciudad FROM destino where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['iddestino'].'">'.$row['ciudad'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			  </td>
              <td>
                        
			    <label for="username">Contrato</label>
                <br>
			    <SELECT NAME="idcontrato">
                            <?php $sql="SELECT idcontrato, ncontrato FROM contrato where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idcontrato'].'">'.$row['ncontrato'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
                         </td>
                         </tr>
                           <tr>
              <td>
			    <label for="username">Producto</label><br>
			    <SELECT NAME="idproducto">
                            <?php $sql="SELECT idproducto, descripcion FROM producto where estado=0";
                            $re=$connect->query($sql);?>
                            <?php while ($row=$re->fetch_assoc()){?>
                           <?php echo'<OPTION VALUE="'.$row['idproducto'].'">'.$row['descripcion'].'</OPTION>'; ?>
                            <?php } ?>
                          </SELECT>
			                 </td>                     
                         <td>
                            <label form="FeBa">Fecha de Balanza:</label><br>
                            <input type="date" class="form-control" id="FeBa" placeholder="Ingresar Fecha de contrato" name="fecha_balanza">  
                        </td>
                        </tr>
                         <tr>
              <td>
			    <label for="username">Merma</label><br>
			    <input type="text" class="form-control " id="merma" name="merma">
			            </td>                     
                         <td>        
                          
			    <label for="username">Peso salida</label><br>
			    <input type="text" class="form-control" id="peso_salida" name="peso_salida">
			   </td>
                        </tr>
                         <tr>
              <td>
                  
                          
			    <label for="username">Peso llegada</label><br>
			    <input type="text" class="form-control sizex" name="peso_llegada">
			  </td>                     
                         <td>
                           
			    <label for="username">Flete</label><br>
			    <input type="text" class="form-control sizex" id="flete" name="flete">
			  </td>
                        </tr>
                         <tr>
              <td>
                           
			    <label for="username">Anticipo al Chofer(%)</label><br>
			    <input type="text" class="form-control" name="porcentaje">
			 </td>                     
                         <td>
                          
			    <label for="username">Monto Total a Pagar</label><br>
			    <input disabled type="text" class="form-control" id="monto" name="flete_peso">
			  
                           </td>
                        </tr>
                         <tr>
              <td>
                            <label form="FeSa">Fecha de salida:</label><br>
                            <input type="date" class="form-control" id="FeSa" placeholder="Ingresar Fecha de salida" name="f_salida">  
                       </td>                     
                         <td>
                            <label form="FeLL">Fecha de llegada:</label><br>
                            <input type="date" class="form-control" id="FeLL" placeholder="Ingresar Fecha de llegada" name="f_llegada">  
			 
                   </td>
                        </tr>
                        
                         </table>
						
						  <button type="button" onClick="validar()" style="margin-top:3px;right:-430px; position:relative" id="registrar" class="btn btn-primary" name="enviar" value="registrar">Guardar</button>
						  <button type="button" style="margin-top:3px;right:-450px; position:relative" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
		 <label id="alerta" style="color:red"></label>
		</form>
      </div> 
      </div>
    </div>
  </div>
<!-- Editar -->
<div id="editar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Edit content-->
    <div class="modal-content" style="width: 600px ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registro</h4>
      </div>
      <div class="modal-body">
          <div >
              <?php include './boleta_modificar.php';?>
          </div>
      </div>
    </div>
  </div>
</div>  
<script type="text/javascript">
function validar() {
	
		if (document.boleta_guardar.nboleta.value.length==0){ 
      	$("#alerta").text("Falta Número de Boleta!");
      	document.boleta_guardar.nboleta.focus() 
      	return 0; 
   	} 
		document.boleta_guardar.submit(); 
}

$( "#flete" ).focusout(function() {
    var a = document.boleta_guardar.peso_salida.value;
	var b = document.boleta_guardar.flete.value;
	var res = a*b;
    $( "#monto" ).val(res);
  })
</script>	
<!-- <script type="text/javascript">



      $(function () {

        $('#boleta_guardar').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'boleta_guardar.php',
            data: $('#boleta_guardar').serialize(),
            success: function () {
             $('#myModal').modal('hide');
			  $("#datos").remove();
			 $("#contenedor").load('boleta_ajax.php #datos');
              return false;
			},
			error: function () {
				 $("#alerta").text("Error al guardar!");
				
			}
			
          });

        });

      });
   

</script> -->    
  </body>
</html>