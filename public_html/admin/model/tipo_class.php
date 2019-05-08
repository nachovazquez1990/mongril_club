<?php 

/***********************************************************

CLASE 
- read_by_id($id)
- read_by_name($tipo)
- read_all_tipos($tipo, $precio, $tipo)
- create_tipo($tipo, $precio, $tipo(numero))
- delete_tipo($id)
- update_tipo($tipo, $precio, $tipo(numero))

************************************************************/


function read_tipo_by_id( $id ){
	
	global $link;
	
	$id = (int) $id;
	
	if(!$id){
		return false;
	} 

	$sql = "SELECT tipo_id, tipo FROM tipos
			WHERE tipo_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_tipo_by_name( $tipo ){
	
	global $link;
	
	$tipo = mysqli_real_escape_string($link,$tipo); 

	if(!$tipo){
		return false;
	}

	$sql = "SELECT tipo_id, tipo FROM tipos
			WHERE tipos.tipo = '$tipo'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_all_tipos(){
	
	global $link;
	
	$sql = "SELECT tipo_id, tipo FROM tipos";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return $query;
	}
	return false;
}

function create_tipo($tipo){
	global $link;

	$tipo = mysqli_real_escape_string($link,$tipo);
	
	if( !$tipo ){
		return false;
	}
	
	$sql = "INSERT INTO tipos(tipo)
			VALUES('$tipo')";

	$query = mysqli_query($link,$sql);

	if(mysqli_insert_id($link)>0){
		return true;
	}

	return false;
}

function delete_tipo( $id ){
	
	global $link;
	
	$id = (int) $id; 

	$sql = "DELETE FROM tipos
			WHERE tipo_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$affected_rows = mysqli_affected_rows( $link );
	if( $affected_rows > 0 ){
		return true;
	}

	return false;
}

function update_tipo($id,$tipo){
	global $link;

	$id = (int) $id;
	$tipo = mysqli_real_escape_string($link,$tipo);
	
	if( !$id || !$tipo ){
		return false;
	}
	
	$sql = "UPDATE tipos SET tipo = '$tipo'
			WHERE tipo_id = '$id'";
			

	$query = mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)>0){
		return true;
	}

	return false;
}

