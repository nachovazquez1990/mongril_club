<?php 
require('load.php');


include('templates/header.php');
include('templates/navbar.php');

$tipo = read_tipo_by_id_controller();
?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>Editar Tipo</h1>
	</div>
</div>


<?php if( !$tipo ): ?>
<div class="row">
	<div class="col-xs-12">
		<p>No se han encontrado datos</p>
	</div>
</div>
<?php else: ?>

<!-- FORMULARIO EDICIÓN PRODUCTOS -->
<div class="row">
	<div class="col-xs-12">
		<form action="?a=update_tipo&tid=<?php echo $tipo['tipo_id'] ?>" method="POST">	
			<input type="hidden" name="tid" value="<?php echo $tipo['tipo_id'] ?>">

			<div class="form-group">
				<label for="tipo">Nombre del tipo</label>
				<input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $tipo['tipo'] ?>">
			</div>		
	
			<button type="submit" class="btn btn-block btn-primary">Actualizar Tipo</button>
		</form>
		<a href="tipos.php">Volver a Tipos</a>
	</div>
		
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