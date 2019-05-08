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
		<h1>Tipos</h1>
	</div>
</div>



<!-- BOTON CREACION PRODUCTO -->
<div class="row">
	<div class="col-xs-12">
		<a href="create_tipo.php" class="btn btn-block btn-primary">Crear Nuevo Tipo</a>
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

<!-- GENERACIÓN LISTADO TipoS -->	
	<div class="row">
		<div class="col-xs-12">
			
		<?php 
			$data = read_all_tipos();
			if($data):
		?>

			<table class="table">
				<thead>
					<tr>
						<th>Nombre del Tipo</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $t): ?>
					<tr>
						<td><?php echo $t['tipo'] ?></td>
						<td><a href="update_tipo.php?tid=<?php echo $t['tipo_id'] ?>">Editar</a></td>
						<td><a href="?a=delete_tipo&tid=<?php echo $t['tipo_id'] ?>">Eliminar</a></td>
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