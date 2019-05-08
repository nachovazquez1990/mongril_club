<?php 
require('load.php');


include('templates/header.php');
include('templates/navbar.php');

?>

<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>Crear Producto</h1>
	</div>
</div>


<!-- FORMULARIO CREACION CERVEZAS -->
<div class="row">
	<div class="col-xs-12">
		<form action="?a=create_producto" method="POST">
			
			<div class="form-group">
				<label for="producto">Nombre del Producto</label>
				<input type="text" name="producto" id="producto" class="form-control">
			</div>

			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="number" name="precio" id="precio" class="form-control" min="0" step="any">
			</div>

			<?php 

						$tipos = read_all_tipos();

			?>

			<div class="form-group">
				<label for="type">Tipo de Producto</label>
				<select name="tid" id="tid" class="form-control">
					<option value="">Escoge un tipo de Producto</option>
					<?php foreach($tipos as $t): 

							$selected = null;
							if( $t['tipo'] === $producto['tipo'] ){
								$selected = 'selected';
							}
					?>
					<option value="<?php echo $t['tipo_id'] ?>" <?php echo $selected ?>><?php echo $t['tipo'] ?></option>
					<?php endforeach; ?>
				</select>
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