<?php 

/***********************************************************

CLASE 
- read_by_id($id)
- read_by_name($producto)
- read_all_socios($producto, $precio, $tipo)
- create_producto($producto, $precio, $tipo(numero))
- delete_producto($id)
- update_producto($producto, $precio, $tipo(numero))

************************************************************/

function socio_consumo($id){

	global $link;

	$id = (int) $id;

	$sql = "SELECT producto, cantidad, importe, fecha FROM consumos
			LEFT JOIN productos ON productos_id = producto_id
			LEFT JOIN socios ON socios_id = socio_id
			WHERE socios_id = '$id'
			ORDER BY fecha DESC";
	$query = mysqli_query($link,$sql);
	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return $query;
	}
	return false;
}

function total_consumo($id){

	global $link;

	$id = (int) $id;

	$sql = "SELECT importe FROM consumos
			LEFT JOIN socios ON socios_id = socio_id
			WHERE socios_id = '$id'";
	$query = mysqli_query($link,$sql);
	$num_rows = mysqli_num_rows($query);

	$total_consumo = 0;
	foreach ($query as $k) {
		$total_consumo = $total_consumo + $k['importe'];
	}
	return $total_consumo;
}

function read_socio_by_id( $id ){
	
	global $link;
	
	$id = (int) $id; 

	$sql = "SELECT socio_id, nombre, apellido_p, apellido_s, dni, fecha_nac, email, foto, firma, saldo FROM socios
			WHERE socio_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_socio_by_dni( $dni ){
	
	global $link;
	
	$dni = mysqli_real_escape_string($link,$dni); 

	if(!$dni){
		return false;
	}

	$sql = "SELECT socio_id, nombre, apellido_p, apellido_s, dni, fecha_nac, email, saldo FROM socios
			WHERE socios.dni = '$dni'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_all_socios(){
	
	global $link;
	
	$sql = "SELECT socio_id, nombre, apellido_p, apellido_s, dni, fecha_nac, email, saldo FROM socios
			ORDER BY socio_id";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return $query;
	}
	return false;
}

function create_socio($nombre,$apellido_p,$apellido_s,$dni,$fecha_nac,$email, $foto, $firma, $saldo){
	global $link;

	$nombre = mysqli_real_escape_string($link,$nombre);
	$apellido_p = mysqli_real_escape_string($link,$apellido_p);
	$apellido_s = mysqli_real_escape_string($link,$apellido_s);
	$dni = mysqli_real_escape_string($link,$dni);
	$fecha_nac =  mysqli_real_escape_string($link,$fecha_nac);
	$email = mysqli_real_escape_string($link,$email);
	$foto = mysqli_real_escape_string($link,$foto);
	$firma = mysqli_real_escape_string($link,$firma);
	$saldo = (float) $saldo;

	if( !$nombre || !$apellido_p || !$apellido_s || !$dni || !$fecha_nac || !$email || !$foto || !$firma ){
		return false;
	}
	if( !$saldo){
		$saldo = 0;
	}
	
	$sql = "INSERT INTO socios(nombre,apellido_p,apellido_s,dni,fecha_nac,email,foto,firma,saldo)
			VALUES('$nombre','$apellido_p','$apellido_s','$dni','$fecha_nac','$email','$foto','$firma','$saldo')";

	$query = mysqli_query($link,$sql);

	if(mysqli_insert_id($link)>0){
		return true;
	}

	return false;
}

function delete_socio( $id ){
	
	global $link;
	
	$id = (int) $id; 

	$sql = "DELETE FROM socios
			WHERE socio_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$affected_rows = mysqli_affected_rows( $link );
	if( $affected_rows > 0 ){
		return true;
	}

	return false;
}

function update_socio($id, $nombre,$apellido_p,$apellido_s,$dni,$fecha_nac,$email, $foto, $firma, $saldo){
	global $link;

	$id = (int) $id;
	$nombre = mysqli_real_escape_string($link,$nombre);
	$apellido_p = mysqli_real_escape_string($link,$apellido_p);
	$apellido_s = mysqli_real_escape_string($link,$apellido_s);
	$dni = mysqli_real_escape_string($link,$dni);
	$fecha_nac =  $fecha_nac;
	$email = mysqli_real_escape_string($link,$email);
	$foto = mysqli_real_escape_string($link,$foto);
	$firma = mysqli_real_escape_string($link,$firma);
	$saldo = (float) $saldo;

	if( !$id || !$nombre || !$apellido_p || !$apellido_s || !$dni || !$fecha_nac || !$email){
		return false;
	}

	if ( !$foto AND $firma ) {
		$sql = "UPDATE socios SET nombre = '$nombre', apellido_p = '$apellido_p', apellido_s = '$apellido_s', dni ='$dni',fecha_nac = '$fecha_nac', email = '$email', firma = '$firma', saldo = '$saldo'
			WHERE socio_id = '$id'";
	}

	elseif ( $foto AND !$firma ) {
		$sql = "UPDATE socios SET nombre = '$nombre', apellido_p = '$apellido_p', apellido_s = '$apellido_s', dni ='$dni',fecha_nac = '$fecha_nac', email = '$email', foto = '$foto', saldo = '$saldo'
			WHERE socio_id = '$id'";
	}elseif ($foto AND $firma){
	
		$sql = "UPDATE socios SET nombre = '$nombre', apellido_p = '$apellido_p', apellido_s = '$apellido_s', dni ='$dni',fecha_nac = '$fecha_nac', email = '$email', foto = '$foto', firma = '$firma', saldo = '$saldo'
			WHERE socio_id = '$id'";
	}else {
		$sql = "UPDATE socios SET nombre = '$nombre', apellido_p = '$apellido_p', apellido_s = '$apellido_s', dni ='$dni',fecha_nac = '$fecha_nac', email = '$email', saldo = '$saldo'
			WHERE socio_id = '$id'";
	}			

	$query = mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)>0){
		return true;
	}

	return false;
}

