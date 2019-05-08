<?php 
require('load.php');


include('templates/header.php');
include('templates/navbar.php');

$socio = read_socio_by_id_controller();
?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1><?php echo $socio['nombre'] . " " . $socio['apellido_p'] . " [socio nº: " . $socio['socio_id'] . "]"?></h1>
	</div>
</div>


<?php if( !$socio ): ?>
<div class="row">
	<div class="col-xs-12">
		<p>No se han encontrado datos</p>
	</div>
</div>
<?php else: ?>

<!-- FORMULARIO EDICIÓN PRODUCTOS -->
<div class="row">
	<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-md-4" style="margin-top: 25px;">
					
			<img src="images/fotos/<?php echo $socio['foto'] ?>" alt="">
					
			<img style="margin-top: 20px;" src="images/firmas/<?php echo $socio['firma'] ?>" alt="">
	
		</div>

		<div class="col-xs-12 col-md-8">
						
				<h3 for="nombre">Nombre</h3>
				<h4><?php echo $socio['nombre'] . " " . $socio['apellido_p'] . " " . $socio['apellido_s']?></h4>
															
				<h3 for="dni">DNI</h3>
				<h4><?php echo $socio['dni'] ?></h4>
			
				<h3 for="fecha_nac">Fecha de Nacimiento</h3>
				<h4><?php echo $socio['fecha_nac'] ?></h4>
			
				<h3 for="email">Email</h3>
				<h4><?php echo $socio['email'] ?></h4>
			
				<h3 for="saldo">Saldo</h3>
				<h4><?php echo $socio['saldo'] ?></h4>					
		</div>
	</div>
</div>
<?php endif; ?>

<?php 

$data = socio_consumo($socio['socio_id']);

 ?>

<?php if( !$data ): ?>
<div class="row">
	<div class="col-xs-12">
		<p>No se han encontrado datos sobre el consumo de este socio.</p>
	</div>
</div>

<?php else: ?>
<div class="row">
	<div class="col-xs-12">

		<?php $total_consumo = total_consumo($socio['socio_id']);?>
		<h2>Consumo | Total: <?php echo $total_consumo?> Euros</h2>
		<table class="table">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Importe</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $c): ?>
				<tr>
					<td><?php echo $c['producto'] ?></td>
					<td><?php echo $c['cantidad'] ?></td>
					<td><?php echo $c['importe'] ?></td>
					<td><?php echo $c['fecha'] ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		
		
	</div>
</div>

<?php endif; ?>
<br>
<br>

<!-- EOL FORMULARIO -->


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



</div><!-- EOL container -->