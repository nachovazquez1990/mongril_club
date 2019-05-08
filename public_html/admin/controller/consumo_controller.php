<?php 	


function create_consumo_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable producto de $_POST
	$socio_id = filter_input(INPUT_POST, 'sid',FILTER_SANITIZE_NUMBER_INT);
	$producto_id = filter_input(INPUT_POST,'pid',FILTER_SANITIZE_NUMBER_INT);
	$cantidad = filter_input(INPUT_POST, 'cantidad');
	$importe = filter_input(INPUT_POST, 'importe');

	date_default_timezone_set('Europe/Madrid');
	$fecha = date('d/m/y | G:i');

	// Compruebo que el contenido de $producto es válido y calculo lo que falta
	if( !read_socio_by_id($socio_id) ){
		$ba_query['message_code'] = 'c106';
		return false;
	}
	if (!$importe  AND $cantidad ) {
		$importe = calcular_importe ($producto_id, $cantidad);
	}
	if ($importe AND !$cantidad) {
		$cantidad = calcular_cantidad ($producto_id, $importe);
	}
	if( !$socio_id || !$producto_id || !$cantidad || !$importe ){
		$ba_query['message_code'] = 'c101';
		return false;
	}
	if( $importe <= 0 ){
		$ba_query['message_code'] = 'c105';
		return false;
	}	
	// Llamo a la función para crear el país. Devuelve la id generada
	$query = create_consumo( $socio_id, $producto_id, $cantidad, $importe, $fecha );

	// Si la id generada es 0 (no id), no se ha podido crear el registro (motivo desconocido)
	if( $query == 0 ){
		$ba_query['message_code'] = 'c102';
		return false;
	}
	// Se ha creado el registro
	$ba_query['message_code'] = 'c100';
	return true;
}

function delete_consumo_controller(){
	// Cargamos las globales
	global $link, $ba_query;

	// Recojo la id que llega por GET
	$id = filter_input(INPUT_GET,'cid',FILTER_SANITIZE_NUMBER_INT);

	if(!$id){
		$ba_query['message_code'] = 'c101';
		return false;
	}
	// Ejecuto la función para borrar un país. Devuelve true o false
	$query = delete_consumo($id);

	// Si es falso o 0
	if( !$query ){
		$ba_query['message_code'] = 'c103';
		return false;
	}
	// Se ha borrado el registro
	$ba_query['message_code'] = 'c104';
	return true;
}

