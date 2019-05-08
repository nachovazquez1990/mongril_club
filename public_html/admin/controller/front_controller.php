<?php

function front_controller(){
	global $link, $ba_query;

	$a = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_SPECIAL_CHARS);

	switch ($a) {
		case 'create_producto': create_producto_controller(); break;
		case 'update_producto': update_producto_controller(); break;
		case 'delete_producto': delete_producto_controller(); break;
		case 'create_tipo': create_tipo_controller(); break;
		case 'update_tipo': update_tipo_controller(); break;
		case 'delete_tipo': delete_tipo_controller(); break;
		case 'create_socio': create_socio_controller(); break;
		case 'update_socio': update_socio_controller(); break;
		case 'delete_socio': delete_socio_controller(); break;
		case 'create_consumo': create_consumo_controller(); break;
		case 'delete_consumo': delete_consumo_controller(); break;
	}

}