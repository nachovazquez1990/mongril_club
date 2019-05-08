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
		<h1>Productos</h1>
	</div>
</div>



<!-- BOTON CREACION PRODUCTO -->
<div class="row">
	<div class="col-xs-12">
		<a href="create_producto.php" class="btn btn-block btn-primary">Crear Nuevo Producto</a>
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

<!-- GENERACIÓN LISTADO PRODUCTOS -->	
	<div class="row">
		<div class="col-xs-12">
			
		<?php 
			$data = read_all_productos();
			if($data):
		?>
			<table class="table">
				<thead>
					<tr>
						<th>Nombre del Producto</th>
						<th>Precio del Producto</th>
						<th>Tipo de Producto</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $p): ?>
					<tr>
						<td><?php echo $p['producto'] ?></td>
						<td><?php echo $p['precio'] . " euros" ?></td>
						<td><?php echo $p['tipo'] ?></td>
						<td><a href="update_producto.php?pid=<?php echo $p['producto_id'] ?>">Editar</a></td>
						<td><a href="?a=delete_producto?pid=<?php echo $p['producto_id'] ?>">Eliminar</a></td>
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