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
		<h1>Infografía</h1>
	</div>
</div>

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
			$total_consumido = ventas_totales();
			if($total_consumido):
		?>

			<h3>Total consumido: <?php echo $total_consumido ?> €</h3>

		<?php else: ?>

			<p>No se han encontrado resultados</p>

		<?php endif; ?>


		<?php 
			$venta_x_tipo = ventas_x_tipo();
			if($venta_x_tipo):
		?>
		<canvas id="grafico1" width="400" height="400"></canvas>
			<script>
				
					var ctx = document.getElementById("#grafico1");

					var tarta1 = new Chart(ctx,{
						type: 'doughnut',
						data: {
						    datasets: [{
						        data: [
						        <?php foreach ($venta_x_tipo as $v): ?>
						        	<?php echo $v['SUM(importe)'] . "," ?>
						        <?php endforeach ?>
						        ]
						    }],
						    labels: [
						        <?php foreach ($venta_x_tipo as $v): ?>
						        	<?php echo "'" . $v['tipo'] . "'" . "," ?>
						        <?php endforeach ?>
						    ]
						}
					})
			</script>

		<?php else: ?>

			<p>No se han encontrado resultados</p>

		<?php endif; ?>

		</div>
	</div>

<?php  
include('templates/footer.php');
?>