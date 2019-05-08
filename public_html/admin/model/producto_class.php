<?php 

/***********************************************************

CLASE 
- read_by_id($id)
- read_by_name($producto)
- read_all_productos($producto, $precio, $tipo)
- create_producto($producto, $precio, $tipo(numero))
- delete_producto($id)
- update_producto($producto, $precio, $tipo(numero))

************************************************************/


function read_producto_by_id( $id ){
	
	global $link;
	
	$id = (int) $id; 

	$sql = "SELECT producto_id, producto, precio, tipo FROM productos
			LEFT JOIN tipos ON tipos_id = tipo_id
			WHERE producto_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_producto_by_name( $producto ){
	
	global $link;
	
	$producto = mysqli_real_escape_string($link,$producto); 

	if(!$producto){
		return false;
	}

	$sql = "SELECT producto_id, producto, precio, tipo FROM productos
			LEFT JOIN tipos ON tipos_id = tipo_id
			WHERE productos.producto = '$producto'";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return mysqli_fetch_assoc($query);
	}
	return false;
}

function read_all_productos(){
	
	global $link;
	
	$sql = "SELECT producto_id, producto, precio, tipo FROM productos
			LEFT JOIN tipos ON tipos_id = tipo_id
			ORDER BY tipo";
	$query = mysqli_query($link,$sql); 

	$num_rows = mysqli_num_rows($query);
	if( $num_rows > 0 ){
		return $query;
	}
	return false;
}

function create_producto($producto,$precio,$tipos_id){
	global $link;

	$producto = mysqli_real_escape_string($link,$producto);
	$precio = (float) $precio;
	$tipos_id = (int) $tipos_id;

	if( !$producto || !$precio || !$tipos_id ){
		return false;
	}
	
	$sql = "INSERT INTO productos(producto,precio,tipos_id)
			VALUES('$producto','$precio','$tipos_id')";

	$query = mysqli_query($link,$sql);

	if(mysqli_insert_id($link)>0){
		return true;
	}

	return false;
}

function delete_producto( $id ){
	
	global $link;
	
	$id = (int) $id; 

	$sql = "DELETE FROM productos
			WHERE producto_id = '$id'";
	$query = mysqli_query($link,$sql); 

	$affected_rows = mysqli_affected_rows( $link );
	if( $affected_rows > 0 ){
		return true;
	}

	return false;
}

function update_producto($id,$producto,$precio,$tipos_id){
	global $link;

	$id = (int) $id;
	$producto = mysqli_real_escape_string($link,$producto);
	$precio = (float) $precio;
	$tipos_id = (int) $tipos_id;

	if( !$id || !$producto || !$precio || !$tipos_id ){
		return false;
	}

	if( !read_tipo_by_id($tipos_id) ){
		return -1;
	}
	
	$sql = "UPDATE productos SET producto = '$producto', precio = '$precio', tipos_id = '$tipos_id'
			WHERE producto_id = '$id'";
			

	$query = mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)>0){
		return true;
	}

	return false;
}

