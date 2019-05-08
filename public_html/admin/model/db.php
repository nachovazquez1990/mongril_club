<?php 
require ('config.php');

function connect_db(){

	// Nos conectamos a la bbdd y guardamos la conexión en la variable $link
	$link = mysqli_connect(SERVERDB,USERDB,PASSDB,NAMEDB,PORTDB);

	// Si ha habido un error en la conexión, matamos la aplicación
	if( mysqli_connect_errno() > 0 ){
		die('Error en la conexión a la base de datos:' . mysqli_connect_error() );
	}

	// Configuramos el juego de caracteres de la conexión a utf8
	mysqli_query($link,"SET NAMES utf8");

	// Retorno los datos de la conexión para que sean usados por otras funciones
	return $link;
}

function close_db(){
	global $link;

	if( mysqli_ping($link) ){
		mysqli_close($link);
	}

}