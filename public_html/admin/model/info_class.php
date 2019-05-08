<?php 

//ventas_totales
//ventas_x_tipo -> tarta
//ventas_x_producto -> barras
//ventas_x_fecha -> linea
//ventas_x_tipo_x_fecha -> lineas
//ventas_x_sociop -> tabla

function ventas_totales(){
		global $link;
	
		$sql ="SELECT SUM(importe) FROM consumos";
		$query = mysqli_query($link,$sql);
		$total = mysqli_fetch_assoc($query);
		
		return $total["SUM(importe)"];
}

function ventas_x_tipo(){
	global $link;
	
	$sql ="SELECT tipo, SUM(importe) FROM consumos
		   LEFT JOIN productos ON productos_id = producto_id
		   LEFT JOIN tipos ON tipos_id = tipo_id
		   GROUP BY tipo ";

	$query = mysqli_query($link,$sql);
	
	return $query;
}

function porcentaje_importe($importe){
	//recojo el total de ventas
	$total = ventas_totales();
	//convierto el importe que recojo por la funcion y saco su porcentaje del total de ventas
	$primero = $importe*100;
	$porcentaje = $primero/$total;
	//me aseguro de que solo tiene dos decimales y lo devuelvo
	$porcentaje = number_format($porcentaje,2);
	return $porcentaje;
}
function porcentaje_tarta($porcentaje){

	$primero = $porcentaje*360;
	$porcentaje_t = $primero/100;
	//me aseguro de que solo tiene dos decimales y lo devuelvo
	$porcentaje_t = number_format($porcentaje_t,1);
	return $porcentaje_t;
}


