<?php 	

function read_tipo_by_id_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	$id = filter_input(INPUT_GET,'tid',FILTER_SANITIZE_NUMBER_INT);
	// Compruebo que el contenido de la id son válidos
	if( !$id ){
		$ba_query['message_code'] = 't101';
		return false;
	}

	$query = read_tipo_by_id($id);
	if(!$query){
		$ba_query['message_code'] = 't108';
		return false;
	}
	return $query;
}

function create_tipo_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable producto de $_POST
	$tipo = filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_SPECIAL_CHARS);

	// Compruebo que el contenido de $producto es válido
	if( !$tipo ){
		$ba_query['message_code'] = 't101';
		return false;
	}
	// Compruebo que el país no existe ya en la base de datos
	if( read_tipo_by_name($tipo) ){
		$ba_query['message_code'] = 't102';
		return false;
	}

	// Llamo a la función para crear el país. Devuelve la id generada
	$query = create_tipo( $tipo );

	// Si la id generada es 0 (no id), no se ha podido crear el registro (motivo desconocido)
	if( $query == 0 ){
		$ba_query['message_code'] = 't103';
		return false;
	}

	// Se ha creado el registro
	$ba_query['message_code'] = 't100';
	return true;
}

function delete_tipo_controller(){
	// Cargamos las globales
	global $link, $ba_query;

	// Recojo la id que llega por GET
	$id = filter_input(INPUT_GET,'tid',FILTER_SANITIZE_NUMBER_INT);

	if(!$id){
		$ba_query['message_code'] = 't101';
		return false;
	}

	// Ejecuto la función para borrar un país. Devuelve true o false
	$query = delete_tipo($id);

	// Si es falso o 0
	if( !$query ){
		$ba_query['message_code'] = 't104';
		return false;
	}

	// Se ha borrado el registro
	$ba_query['message_code'] = 't105';
	return true;
}

function update_tipo_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable producto de $_POST
	$id = filter_input(INPUT_POST,'tid',FILTER_SANITIZE_NUMBER_INT);
	$tipo = filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_SPECIAL_CHARS);

	// Compruebo que el contenido de $producto y la id son válidos
	if( !$id || !$tipo ){
		$ba_query['message_code'] = 't101';
		return false;
	}
	if( read_tipo_by_name($tipo) ){
		$ba_query['message_code'] = 't102';
		return false;
	}

	// Llamo a la función para actualizar el país. Devuelve el número de filas afectadas
	$query = update_tipo( $id, $tipo );

	// Si el número de filas afectadas es 0, no se ha podido actualizar el registro (motivo desconotido)
	if( $query == 0 ){
		$ba_query['message_code'] = 't106';
		return false;
	}

	// Se ha actualizado el registro
	$ba_query['message_code'] = 't107';
	return true;
}