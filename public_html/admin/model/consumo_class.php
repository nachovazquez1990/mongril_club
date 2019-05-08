<?php 

/***********************************************************

CLASE 
- read_by_id($id)
- read_by_name($consumo)
- read_all_consumos($consumo, $precio, $consumo)
- create_consumo($consumo, $precio, $consumo(numero))
- delete_consumo($id)
- update_consumo($consumo, $precio, $consumo(numero))

************************************************************/

function restar_dinero_socio($socio_id, $importe){
	global $link;

	$socio_id = (int) $socio_id;
	$importe = (float) $importe;

	$sql = "SELECT saldo FROM socios
			WHERE socio_id = '$socio_id'";
	$query = mysqli_query($link,$sql);
	$ahorro = mysqli_fetch_assoc($query);
	
	$ahorro_final = $ahorro['saldo'];
	

	$saldo_restante = $ahorro_final - $importe;
	if ($saldo_restante < 0) {
		$ba_query['message_code'] = 'c107';
		return false;
	}
	
	$sql2 = "UPDATE socios SET saldo = '$saldo_restante'
			 WHERE socio_id = '$socio_id'";
	$query2 = mysqli_query($link,$sql2);
	if(!mysqli_affected_rows($link)){
		$ba_query['message_code'] = 'c108';
		return false;
	}
	return true;
}

function calcular_importe($producto_id, $cantidad){
	global $link;

	$producto_id = (int) $producto_id;
	$cantidad = (float) $cantidad;

	$sql = "SELECT precio FROM productos
			WHERE producto_id = '$producto_id'";
	$query = mysqli_query($link,$sql);
	$coste = mysqli_fetch_assoc($query);

	$coste_final = $coste['precio'];
	
	
	$importe = $cantidad * $coste_final;

	return $importe;
}

function calcular_cantidad($producto_id, $importe){
	global $link;

	$producto_id = (int) $producto_id;
	$importe = (float) $importe;

	$sql = "SELECT precio FROM productos
			WHERE producto_id = '$producto_id'";
	$query = mysqli_query($link,$sql);
	$coste = mysqli_fetch_assoc($query);
	
	$coste_final = $coste['precio'];
	
	$cantidad = $importe / $coste_final;

	return $cantidad;
}

function devolver_dinero_socio($socio_id, $importe){
	global $link;

	$socio_id = (int) $socio_id;
	$importe = (float) $importe;

	$sql = "SELECT saldo FROM socios
			WHERE socio_id = '$socio_id'";
	$query = mysqli_query($link,$sql);
	$ahorro = mysqli_fetch_assoc($query);
	
	$ahorro_final = $ahorro['saldo'];

	$saldo_restante = $importe + $ahorro_final;

	$sql2 = "UPDATE socios SET saldo = '$saldo_restante'
			 WHERE socio_id = '$socio_id'";
	$query2 = mysqli_query($link,$sql2);
	if(mysqli_affected_rows($link)>0){
		return true;
	}

	return false;
}

function create_consumo($socios_id, $productos_id, $cantidad, $importe, $fecha){
	global $link;

	$socio_id = (int) $socios_id;
	$producto_id = (int) $productos_id;
	$cantidad = (float) $cantidad;
	$importe = (float) $importe;
	$fecha = $fecha;
	
	if( !$socio_id || !$producto_id || !$cantidad || !$importe || !$fecha ){
		return false;
	}

	$sql = "INSERT INTO consumos(socios_id, productos_id, cantidad, importe, fecha)
			VALUES('$socios_id', '$producto_id', '$cantidad', '$importe', '$fecha')";
	$query = mysqli_query($link,$sql);

	if(mysqli_insert_id($link)>0){
		restar_dinero_socio($socio_id, $importe);
		return true;
	}

	return false;
}

function read_consumo_by_id( $id ){
	
	global $link;
	
	$id = (int) $id; 

	$sql = "SELECT consumo_id, socios_id, producto, precio, importe, fecha FROM consumos
			LEFT JOIN socios ON socios_id = socio_id
			LEFT JOIN productos ON productos_id = producto_id
			WHERE consumo_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_consumo_by_name( $producto ){
	
	global $link;
	
	$producto = mysqli_real_escape_string($link,$producto); 

	if(!$producto){
		return false;
	}

	$sql = "SELECT consumo_id, producto, precio, fecha FROM consumos
			LEFT JOIN productos ON productos_id = producto_id
			WHERE productos.producto = '$producto'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_all_consumos(){
	
	global $link;
	
	$sql = "SELECT consumo_id, socios_id, producto, precio, cantidad, importe, fecha FROM consumos
			LEFT JOIN productos ON productos_id = producto_id
			ORDER BY consumo_id DESC";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return $query;
	}
	return false;
}

function delete_consumo( $id ){
	
	global $link;
	
	$id = (int) $id;

	$consumo = read_consumo_by_id($id);
	$socio_id = $consumo['socios_id'];
	$importe = $consumo ['importe'];

	$resultado = devolver_dinero_socio($socio_id, $importe);
	if ($resultado = false) {
		return false;
	}
	$sql = "DELETE FROM consumos
			WHERE consumo_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$affected_rows = mysqli_affected_rows( $link );
	if( $affected_rows > 0 ){
		return true;
	}

	return false;
}




