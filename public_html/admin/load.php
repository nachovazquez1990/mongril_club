<?php 

$ba_query = array(
	'message_code' => null,
);

require('model/db.php');

// Modelos
require('model/producto_class.php');
require('model/socio_class.php');
require('model/tipo_class.php');
require('model/consumo_class.php');
require('model/info_class.php');

// Controladores
require('controller/front_controller.php');
require('controller/producto_controller.php');
require('controller/tipo_controller.php');
require('controller/consumo_controller.php');
require('controller/socio_controller.php');
require('controller/messages.php');

$link = connect_db();
front_controller();