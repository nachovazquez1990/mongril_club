<?php 
require('load.php');


include('templates/header.php');
include('templates/navbar.php');

$socio = read_socio_by_id_controller();
?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>Editar Socio</h1>
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
		<div class="col-xs-12 col-md-4">
			<form action="?a=update_socio&sid=<?php echo $socio['socio_id'] ?>" method="POST">
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" id="foto" class="form-control" value="<?php echo $socio['foto'] ?>">
						<img src="images/fotos/<?php echo $socio['foto'] ?>" alt="">
					</div>

					<div class="form-group">
						<label for="firma">Firma</label>						
						<input type="file" name="firma" id="firma" class="form-control" value="<?php echo $socio['firma'] ?>">
						<img style="margin-top: 20px;" src="images/firmas/<?php echo $socio['firma'] ?>" alt="">
					</div>
		</div>

		<div class="col-xs-12 col-md-8">
		
					<input type="hidden" name="sid" value="<?php echo $socio['socio_id'] ?>">
					<div class="form-group">
						<label for="nombre">Número de Socio</label>
						<input type="number" name="sid" id="sid" readonly class="form-control" value="<?php echo $socio['socio_id'] ?>">
					</div>

					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $socio['nombre'] ?>">
					</div>
					
					<div class="form-group">
						<label for="apellido_p">1º Apellido</label>
						<input type="text" name="apellido_p" id="apellido_p" class="form-control" value="<?php echo $socio['apellido_p'] ?>">
					</div>
					
					<div class="form-group">
						<label for="apellido_s">2º Apellido</label>
						<input type="text" name="apellido_s" id="apellido_s" class="form-control" value="<?php echo $socio['apellido_s'] ?>">
					</div>
					
					<div class="form-group">
						<label for="dni">DNI</label>
						<input type="text" name="dni" id="dni" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" class="form-control" value="<?php echo $socio['dni'] ?>">
					</div>

					<div class="form-group">
						<label for="fecha_nac">Fecha de Nacimiento</label>
						<input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="<?php echo $socio['fecha_nac'] ?>">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo $socio['email'] ?>">
					</div>

					<div class="form-group">
						<label for="saldo">Saldo</label>
						<input type="number" step="any" name="saldo" id="saldo" class="form-control" value="<?php echo $socio['saldo'] ?>">
					</div>
				</div>
			
			</div>

			<button type="submit" class="btn btn-block btn-primary">Actualizar Socio</button>
		</form>

		<a href="socios.php">Volver a Socios</a>
	</div>
</div>
<br>
<br>
<?php endif; ?>
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