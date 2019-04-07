<?php

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