<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Desubscripción de nuestro servicio</title>
		<style>
			div.anuncio{margin: auto; 
						background-color:#eee; 
						border-radius: 30px; 
						text-align: center; 
						width: 360px;}
		</style>
		<?php
			require 'class.ClientList.php';
			$clientlist = new ClientList;
			$hosting=$clientlist->getHosting();
		?>
	</head>
	<body>
		<div class="anuncio">
			<h2>Servicio de desubscripción</h2>
			<?php
				if( isset($_REQUEST['i']) 
					&& !empty($_REQUEST['i']) 
					&& isset($_REQUEST['vh']) 
					&& !empty($_REQUEST['vh']) ) {

						//Aplicación de Desubscripción
						$clientlist->checkSubscription($_REQUEST['i'], 
														$_REQUEST['vh']); 	
				}
				else {
						//Seguridad de Request, reenvio al hosting de la web
						header("Location: $hosting");	
				}
			?>
		</div>
	</body>
</html>
