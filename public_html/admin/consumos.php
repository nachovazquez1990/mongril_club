<?php

require ('load.php');

?>

<?php 

include('templates/header.php');
include('templates/navbar.php');

 ?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>Consumos</h1>
	</div>
</div>



<!-- BOTON CREACION CONSUMOS -->
<div class="row">
	<div class="col-xs-12">
		<a href="create_consumo.php" class="btn btn-block btn-primary">Nuevo Consumo</a>
	</div>
</div>
<br>
<br>
<!-- EOL BOTON -->

<!-- MENSAJES DE APLICACION -->
<?php if( !is_null( $ba_query['message_code']) &&  array_key_exists($ba_query['message_code'], $messages)): ?>
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-info alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<?php echo $messages[ $ba_query['message_code'] ] ?>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- EOL MENSAJES APLICACION -->

<!-- GENERACIÓN LISTADO CONSUMOS -->	
	<div class="row">
		<div class="col-xs-12">
			
		<?php 
			$data = read_all_consumos();
			if($data):
		?>

			<table class="table">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Nº Socio</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Importe</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $c): ?>
					<tr>
						<td><?php echo $c['fecha'] ?></td>
						<td><?php echo $c['socios_id'] ?></td>
						<td><?php echo $c['producto'] ?></td>
						<td><?php echo $c['precio'] ?></td>
						<td><?php echo $c['cantidad'] ?></td>
						<td><?php echo $c['importe'] ?></td>
						<td><a href="?a=delete_consumo&cid=<?php echo $c['consumo_id'] ?>">Eliminar</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		<?php else: ?>

			<p>No se han encontrado resultados</p>

		<?php endif; ?>

		</div>
	</div>

<?php  
include('templates/footer.php');
?>