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
		<h1>Socios</h1>
	</div>
</div>



<!-- BOTON CREACION SOCIOS -->
<div class="row">
	<div class="col-xs-12">
		<a href="create_socio.php" class="btn btn-block btn-primary">Crear Nuevo Socio</a>
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

<!-- GENERACIÓN LISTADO SOCIOS -->	
	<div class="row">
		<div class="col-xs-12">
			
		<?php 
			$data = read_all_socios();
			if($data):
		?>

			<table class="table">
				<thead>
					<tr>
						<th>Nº Socio</th>
						<th>Nombre</th>
						<th>1º Apellido</th>
						<th>2º Apellido</th>
						<th>DNI</th>
						<th>Fecha Nac.</th>
						<th>Email</th>
						<th>Saldo</th>
						<th>Perfil</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $s): ?>
					<tr>
						<td><?php echo $s['socio_id'] ?></td>
						<td><?php echo $s['nombre'] ?></td>
						<td><?php echo $s['apellido_p'] ?></td>
						<td><?php echo $s['apellido_s'] ?></td>
						<td><?php echo $s['dni'] ?></td>
						<td><?php echo $s['fecha_nac'] ?></td>
						<td><?php echo $s['email'] ?></td>
						<td><?php echo $s['saldo'] . " Euros"?></td>
						<td><a href="perfil_socio.php?sid=<?php echo $s['socio_id'] ?>">Perfil</a></td>
						<td><a href="update_socio.php?sid=<?php echo $s['socio_id'] ?>">Editar</a></td>
						<td><a href="?a=delete_socio&sid=<?php echo $s['socio_id'] ?>">Eliminar</a></td>
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