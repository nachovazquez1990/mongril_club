<?php 	

function read_producto_by_id_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	$id = filter_input(INPUT_GET,'pid',FILTER_SANITIZE_NUMBER_INT);
	// Compruebo que el contenido de la id son válidos
	if( !$id ){
		$ba_query['message_code'] = 'p101';
		return false;
	}

	$query = read_producto_by_id($id);
	if(!$query){
		$ba_query['message_code'] = 'p108';
		return false;
	}
	return $query;
}

function create_producto_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable producto de $_POST
	$producto = filter_input(INPUT_POST,'producto',FILTER_SANITIZE_SPECIAL_CHARS);
	$precio = filter_input(INPUT_POST, 'precio');
	$tipo = filter_input(INPUT_POST, 'tid',FILTER_SANITIZE_NUMBER_INT);

	// Compruebo que el contenido de $producto es válido
	if( !$producto || !$tipo ){
		$ba_query['message_code'] = 'p101';
		return false;
	}
	if( $precio <= 0 ){
		$ba_query['message_code'] = 'p109';
		return false;
	}	

	// Compruebo que el país no existe ya en la base de datos
	if( read_producto_by_name($producto) ){
		$ba_query['message_code'] = 'p102';
		return false;
	}

	// Llamo a la función para crear el país. Devuelve la id generada
	$query = create_producto( $producto, $precio, $tipo );

	// Si la id generada es 0 (no id), no se ha podido crear el registro (motivo desconocido)
	if( $query == 0 ){
		$ba_query['message_code'] = 'p103';
		return false;
	}

	// Se ha creado el registro
	$ba_query['message_code'] = 'p100';
	return true;
}

function delete_producto_controller(){
	// Cargamos las globales
	global $link, $ba_query;

	// Recojo la id que llega por GET
	$id = filter_input(INPUT_GET,'pid',FILTER_SANITIZE_NUMBER_INT);

	if(!$id){
		$ba_query['message_code'] = 'p101';
		return false;
	}

	// Ejecuto la función para borrar un país. Devuelve true o false
	$query = delete_producto($id);

	// Si es falso o 0
	if( !$query ){
		$ba_query['message_code'] = 'p104';
		return false;
	}

	// Se ha borrado el registro
	$ba_query['message_code'] = 'p105';
	return true;
}

function update_producto_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable producto de $_POST
	$id = filter_input(INPUT_POST,'pid',FILTER_SANITIZE_NUMBER_INT);
	$producto = filter_input(INPUT_POST,'producto',FILTER_SANITIZE_SPECIAL_CHARS);
	$precio = filter_input(INPUT_POST, 'precio');
	$tipo = filter_input(INPUT_POST, 'tid',FILTER_SANITIZE_NUMBER_INT);

	// Compruebo que el contenido de $producto y la id son válidos
	if( !$producto || !$id || !$precio || !$tipo ){
		$ba_query['message_code'] = 'p101';
		return false;
	}

	// Llamo a la función para actualizar el país. Devuelve el número de filas afectadas
	$query = update_producto( $id,$producto,$precio,$tipo );

	// Si el número de filas afectadas es 0, no se ha podido actualizar el registro (motivo desconotido)
	if( $query == 0 ){
		$ba_query['message_code'] = 'p106';
		return false;
	}

	// Se ha actualizado el registro
	$ba_query['message_code'] = 'p107';
	return true;
}