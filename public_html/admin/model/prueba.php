<?php 
require ('../load.php');
function prueba(){
	global $link;
	
	$sql ="SELECT tipo, SUM(importe) FROM consumos
		   LEFT JOIN productos ON productos_id = producto_id
		   LEFT JOIN tipos ON tipos_id = tipo_id
		   GROUP BY tipo ";

	$query = mysqli_query($link,$sql);
	
	return $query;
}
$prueba = prueba();
foreach ($prueba as $a) {
	echo $a['tipo'] . "  ||  ";
}