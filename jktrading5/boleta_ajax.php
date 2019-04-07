<?php
   $connect=new mysqli("localhost","root","","jk");
    mysqli_query ($connect,"set character_set_results='utf8'");
    if(mysqli_connect_errno()){
        echo 'Conexion Fallida:',  mysqli_connect_error();
        exit();
    }
$query="SELECT boleta_pesaje.idboleta,boleta_pesaje.nboleta, chofer.nombre_chofer, camion.placa, silo.nombre_silo, producto.descripcion, destino.ciudad, contrato.ncontrato, boleta_pesaje.fecha_de_balanza, boleta_pesaje.merma, boleta_pesaje.peso_producto_salida, boleta_pesaje.peso_producto_llegada, boleta_pesaje.flete, boleta_pesaje.porcentaje, boleta_pesaje.fletexpeso, boleta_pesaje.fecha_salida, boleta_pesaje.fecha_llegada
FROM boleta_pesaje
    LEFT JOIN silo ON boleta_pesaje.idsilo = silo.idsilo
    LEFT JOIN chofer ON boleta_pesaje.idchofer = chofer.idchofer
    LEFT JOIN destino ON boleta_pesaje.iddestino = destino.iddestino
    LEFT JOIN camion ON boleta_pesaje.idcamion = camion.idcamion
    LEFT JOIN contrato ON boleta_pesaje.idcontrato = contrato.idcontrato
    LEFT JOIN producto ON boleta_pesaje.idproducto = producto.idproducto
     where boleta_pesaje.estado= 0 order by boleta_pesaje.nboleta";
$resultado=$connect->query($query);
?>
    <tbody>
       <?php while ($row=$resultado->fetch_assoc()){?>
      <tr>
          <td style ="width:70px"><?php echo $row['nboleta'];?></td>
        <td><?php echo $row['nombre_chofer'];?></td>
        <td><?php echo $row['placa'];?></td>
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
    
