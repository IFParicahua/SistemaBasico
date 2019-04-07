<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JKSystem</title>
	</head>
  <body>
      <div class="container" >
  <h2>Importado</h2>
  <p></p>            
  
<?php  
 include_once 'getExtension.php';
 include_once 'conexion.php';
 include ("PHPExcel/IOFactory.php");  
 $name = $_FILES['inputexcel']['name'];
	$size = $_FILES['inputexcel']['size'];
	$tmp = $_FILES['inputexcel']['tmp_name'];
 
 
 $ext = getExtension($name);
 date_default_timezone_set('America/La_Paz');
 $actual_name = date("YmdHis").".".$ext;
 $url="tempo/";
function excelDateToDate($date){
  $UNIX_DATE = ($date - 25569) * 86400;
  return gmdate("Y-m-d", $UNIX_DATE);
}
 
  
 if(move_uploaded_file($_FILES['inputexcel']['tmp_name'],$url.$actual_name)){
 
 $objPHPExcel = PHPExcel_IOFactory::load($url.$actual_name);  
  
 $worksheet = $objPHPExcel->getSheet(0);

      $highestRow = $worksheet->getHighestRow();
 
 $html="<table class='table table-striped' style='background: white; width: 1200px;'>
    <thead>
      <tr style=' 
  text-align: center;
  font-size: 15px; ' >
   
        <th>Contrato</th>
		<th>Camion</th>
		<th>Peso salida</th>
		<th style ='width:70px ; white-space: nowrap;'>Nro Boleta</th>
		 <th>Transportadora</th>
		<th>Chofer</th>
        
        <th>Silo</th>
		 <th>Flete</th>
        <th>Anticipo %</th>
		<th>Cheque</th>
		 <th>Monto Total</th>
		<th >Fecha Balanza</th>
		<th >Fecha Contrato</th>
		<th >Dir. Silo</th>
		
		
        <th>Destino</th>
        <th>Producto</th>
		<th>Color Camion</th>
        <th >Carguio</th>

        
		</tr></thead>";  
   
      for ($row=12; $row<=164; $row++)  
      {  
           
           $ncontrato[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
           $placa[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
		   $peso[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
		   $nboleta[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
		   $transportadora[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
		   $chofer[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
		   $silo[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
		   $flete[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
		   $porcentaje[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
		   $cheque[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
		   $fletetotal[$row] = ($peso[$row]*$flete[$row])/1000;
		   $fecha_balanza[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
		   $fecha_balanza[$row] = excelDateToDate($fecha_balanza[$row]);
		   $fecha_contrato[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
		   $fecha_contrato[$row] = excelDateToDate($fecha_contrato[$row]);
		   $dir_silo[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
		   $destino[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
		   $producto[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
		   $color_camion[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());
		   $carguio[$row] = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());  
		   
          
		    $html.="<tr>";   
           $html.= '<td>'.$ncontrato[$row].'</td>';  
           $html .= '<td>'.$placa[$row].'</td>'; 
		   
		   $html .= '<td>'.$peso[$row].'</td>';
		   $html .= '<td>'.$nboleta[$row].'</td>';
		   $html .= '<td>'.$transportadora[$row].'</td>';
		   $html .= '<td>'.$chofer[$row].'</td>';
		   $html .= '<td>'.$silo[$row].'</td>';
		   $html .= '<td>'.$flete[$row].'</td>';
		   $html .= '<td>'.$porcentaje[$row].'</td>';
		   $html .= '<td>'.$cheque[$row].'</td>';
		   $html .= '<td>'.$fletetotal[$row].'</td>';
		   $html .= '<td>'.$fecha_balanza[$row].'</td>';
		   $html .= '<td>'.$fecha_contrato[$row].'</td>';
		   $html .= '<td>'.$dir_silo[$row].'</td>';
		   $html .= '<td>'.$destino[$row].'</td>';
		   $html .= '<td>'.$producto[$row].'</td>'; 
		   $html .= '<td>'.$color_camion[$row].'</td>';
		   $html .= '<td>'.$carguio[$row].'</td>';
           $html .= "</tr>"; 
            $sql = "INSERT INTO temporal(ncontrato, placa,peso_producto_salida,nboleta,nombre_transportadora,
			nombre_chofer,nombre_silo,flete,porcentaje,cheque,fletexpeso,fecha_contrato,fecha_de_balanza,direccion_silo,ciudad,descripcion,color,carguio) 
			VALUES 
			('".$ncontrato[$row]."', '".$placa[$row]."','".$peso[$row]."',
			'".$nboleta[$row]."','".$transportadora[$row]."','".$chofer[$row]."','".$silo[$row]."','".$flete[$row]."','".$porcentaje[$row]."','".$cheque[$row]."','".$fletetotal[$row]."','".$fecha_balanza[$row]."','".$fecha_contrato[$row]."','".$dir_silo[$row]."'
			,'".$destino[$row]."','".$producto[$row]."','".$color_camion[$row]."','".$carguio[$row]."')";  
           mysqli_query($connect, $sql)
		   or die(mysqli_error($connect));
		   }
       
   
 $html .= '</table>';  
 echo $html;  
 
 } else{
	 echo 'Error';
	 
 }
 mysqli_close($connect);
 ?>  
 </body>
 </html>