<?php
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	require_once('nusoap.php');

	$host = 'http://localhost:8080/Cari/FinalNuevaPractica/capaServidor/wsNexoServidor.php?wsdl';
	$cliente = new nusoap_client($host);

	$err = $cliente->getError();	
	if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
	}

	switch ($_POST['accion']) {
			case 'Alta':			
				$result = $cliente->call('Agregar', array($_POST['nombre'], $_POST['precio'],$_POST['tipo']));
				echo $result;
				break;
			case 'Modificacion':
				$codigo = $_POST['codigoModifcar'];
				$result = $cliente->call('TraerUnMaterialPorCodigo', array($codigo));
				echo $result;
				//var_dump("ok", $result);
				//var_dump($result);
				# code...
				break;
			case 'Modificar':
				$codigo = $_POST['codigo'];
				$nombre = $_POST['nombre'];
				$precio = $_POST['precio'];
				$tipo = $_POST['tipo'];
				$result = $cliente->call('Modificar', array($codigo, $nombre, $precio, $tipo));
				echo $result;
				//var_dump("ok", $result);
				//var_dump($result);
				# code...
				break;
			case 'Baja':
				$codigo = $_POST['codigoBaja'];
				$result = $cliente->call('Eliminar', array($codigo));
				echo $result;

				
				break;
				default:
				echo "entro al default";
			
			
	}	
	
	
	

 ?>