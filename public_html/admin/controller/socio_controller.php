<?php 	

function read_socio_by_id_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	$id = filter_input(INPUT_GET,'sid',FILTER_SANITIZE_NUMBER_INT);
	// Compruebo que el contenido de la id son válidos
	if( !$id ){
		$ba_query['message_code'] = 's101';
		return false;
	}

	$query = read_socio_by_id($id);
	if(!$query){
		$ba_query['message_code'] = 's108';
		return false;
	}
	return $query;
}

function create_socio_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable socio de $_POST
	$nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_SPECIAL_CHARS);
	$apellido_p = filter_input(INPUT_POST, 'apellido_p',FILTER_SANITIZE_SPECIAL_CHARS);
	$apellido_s = filter_input(INPUT_POST, 'apellido_s',FILTER_SANITIZE_SPECIAL_CHARS);
	$dni = filter_input(INPUT_POST, 'dni',FILTER_SANITIZE_SPECIAL_CHARS);
	$fecha_nac = filter_input(INPUT_POST, 'fecha_nac',FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
	$foto = filter_input(INPUT_POST, 'foto',FILTER_SANITIZE_URL);
	$firma = filter_input(INPUT_POST, 'firma',FILTER_SANITIZE_URL);
	$saldo = filter_input(INPUT_POST, 'saldo');

	// Compruebo que el contenido de $socio es válido
	if( !$nombre || !$apellido_p || !$apellido_s || !$dni || !$fecha_nac || !$foto || !$firma ){
		$ba_query['message_code'] = 's101';
		return false;
	}
	if( !$saldo){
		$saldo = 0;
	}

	// Compruebo que el socio no existe ya en la base de datos
	if( read_socio_by_dni($dni) ){
		$ba_query['message_code'] = 's102';
		return false;
	}

	// Llamo a la función para crear el socio. Devuelve la id generada
	$query = create_socio( $nombre,$apellido_p,$apellido_s,$dni,$fecha_nac,$email, $foto, $firma, $saldo );

	// Si la id generada es 0 (no id), no se ha podido crear el registro (motivo desconocido)
	if( $query == 0 ){
		$ba_query['message_code'] = 's103';
		return false;
	}

	// Se ha creado el registro
	$ba_query['message_code'] = 's100';
	return true;
}

function delete_socio_controller(){
	// Cargamos las globales
	global $link, $ba_query;

	// Recojo la id que llega por GET
	$id = filter_input(INPUT_GET,'sid',FILTER_SANITIZE_NUMBER_INT);

	if(!$id){
		$ba_query['message_code'] = 's101';
		return false;
	}

	// Ejecuto la función para borrar un país. Devuelve true o false
	$query = delete_socio($id);

	// Si es falso o 0
	if( !$query ){
		$ba_query['message_code'] = 's104';
		return false;
	}

	// Se ha borrado el registro
	$ba_query['message_code'] = 's105';
	return true;
}

function update_socio_controller(){
	// Cargo la conexión global y el superarray
	global $link,$ba_query;

	// Recojo la variable producto de $_POST
	$id = filter_input(INPUT_POST,'sid',FILTER_SANITIZE_NUMBER_INT);
	$nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_SPECIAL_CHARS);
	$apellido_p = filter_input(INPUT_POST, 'apellido_p',FILTER_SANITIZE_SPECIAL_CHARS);
	$apellido_s = filter_input(INPUT_POST, 'apellido_s',FILTER_SANITIZE_SPECIAL_CHARS);
	$dni = filter_input(INPUT_POST, 'dni',FILTER_SANITIZE_SPECIAL_CHARS);
	$fecha_nac = filter_input(INPUT_POST, 'fecha_nac',FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
	$foto = filter_input(INPUT_POST, 'foto',FILTER_SANITIZE_URL);
	$firma = filter_input(INPUT_POST, 'firma',FILTER_SANITIZE_URL);
	$saldo = filter_input(INPUT_POST, 'saldo');

	// Compruebo que el contenido de $producto y la id son válidos
	if( !$id || !$nombre || !$apellido_p || !$apellido_s || !$dni || !$fecha_nac){
		$ba_query['message_code'] = 's101';
		return false;
	}

	$comprobar = read_socio_by_id($id);

	if (!$comprobar['firma'] AND !$firma) {
		$ba_query['message_code'] = 's101';
		return false;
	}

	if (!$comprobar['foto'] AND !$foto) {
		$ba_query['message_code'] = 's101';
		return false;
	}

	// Llamo a la función para actualizar el país. Devuelve el número de filas afectadas
	$query = update_socio( $id, $nombre,$apellido_p,$apellido_s,$dni,$fecha_nac,$email, $foto, $firma, $saldo );

	// Si el número de filas afectadas es 0, no se ha podido actualizar el registro (motivo desconotido)
	if( $query == 0 ){
		$ba_query['message_code'] = 's106';
		return false;
	}

	// Se ha actualizado el registro
	$ba_query['message_code'] = 's107';
	return true;
}