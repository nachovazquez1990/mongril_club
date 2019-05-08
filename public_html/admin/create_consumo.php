<?php 
require('load.php');


include('templates/header.php');
include('templates/navbar.php');

?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>Crear Consumo</h1>
	</div>
</div>


<!-- FORMULARIO CREACION CERVEZAS -->
<div class="row">
	<div class="col-xs-12">
		<form action="?a=create_consumo" method="POST">
		<div class="row">
		<div class="col-xs-12">

			<div class="form-group">
				<label for="sid">Nº de Socio</label>
				<input type="number" name="sid" id="sid" class="form-control" min="1" step="1">
			</div>	

			<?php $productos = read_all_productos(); ?>

			<div class="form-group">
				<label for="pid">Producto</label>
				<select name="pid" id="pid" class="form-control">
					<option value="">Escoge un Producto</option>
					<?php foreach($productos as $p): ?>
					<option value="<?php echo $p['producto_id'] ?>"><?php echo $p['producto'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="cantidad">Cantidad </label>
					<input type="number" name="cantidad" id="cantidad" class="form-control" min="0" step="any">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="importe">Importe </label>
					<input type="number" name="importe" id="importe" class="form-control" min="0" step="any">
				</div>
			</div>
		</div>

			<button type="submit" class="btn btn-block btn-primary">Crear producto</button>
		</form>
	</div>
</div>
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