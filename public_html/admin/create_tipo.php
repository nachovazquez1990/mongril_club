<?php 
require('load.php');


include('templates/header.php');
include('templates/navbar.php');

?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>Crear Tipo de Producto</h1>
	</div>
</div>


<!-- FORMULARIO CREACION CERVEZAS -->
<div class="row">
	<div class="col-xs-12">
		<form action="?a=create_tipo" method="POST">
			
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" name="tipo" id="tipo" class="form-control">
			</div>
	</div>
</div>

			<button type="submit" class="btn btn-block btn-primary">Crear tipo</button>
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