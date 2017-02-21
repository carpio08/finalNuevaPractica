<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once('nusoap.php'); 
require_once('claseMaterial.php');

function Agregar($nombre, $precio, $tipo){
	$objMaterial = new Material();
	$objMaterial->SetNombre($nombre);
	$objMaterial->SetPrecio($precio);
	$objMaterial->SetTipo($tipo);
	$rta = $objMaterial->InsertarMaterial();
	return $rta;
}

function TraerUnMaterialPorCodigo($codigo){
	$objMaterial = new Material();
	$objMaterial->SetCodigo($codigo);
	$material = $objMaterial->TraerUnMaterial();
	return $material;
}

function Modificar ($codigo, $nombre, $precio, $tipo){
	$objMaterial = new Material();
	$objMaterial->SetCodigo($codigo);
	$objMaterial->SetNombre($nombre);
	$objMaterial->SetPrecio($precio);
	$objMaterial->SetTipo($tipo);
	$rta = $objMaterial->ModificarMaterial();
	return $rta;
}

function Eliminar($codigo){
	$rta = Material::BorrarMaterial($codigo);
	return $rta;
}

$server = new nusoap_server(); 

$server->configureWSDL('WS DE LOGGIN', 'urn:wsMateriales'); 

$server->register("Agregar",
	array(
		'nombre' => 'xsd:string',
		'precio' => 'xsd:int',
		'tipo' => 'xsd:string'),
	array('return' => 'xsd:string'),
	'urn:wsMateriales',            				// NAMESPACE
	'urn:wsMateriales#Agregar',         		// ACCION SOAP
	'rpc',                        				// ESTILO
	'encoded',                    				// CODIFICADO
	'alta de materiales'
	);

$server->register("TraerUnMaterialPorCodigo",
	array(
		'codigo' => 'xsd:int'),
	array('return' => 'xsd:Array'),
	'urn:wsMateriales',            				// NAMESPACE
	'urn:wsMateriales#Agregar',         		// ACCION SOAP
	'rpc',                        				// ESTILO
	'encoded',                    				// CODIFICADO
	'traer un materiales'
	);

$server->register("Modificar",
	array(
		'codigo' => 'xsd:int',
		'nombre' => 'xsd:string',
		'precio' => 'xsd:int',
		'tipo' => 'xsd:string'),
	array('return' => 'xsd:string'),
	'urn:wsMateriales',            				// NAMESPACE
	'urn:wsMateriales#Modificar',         		// ACCION SOAP
	'rpc',                        				// ESTILO
	'encoded',                    				// CODIFICADO
	'alta de materiales'
	);

$server->register("Eliminar",
	array(
		'codigo' => 'xsd:int'),
	array('return' => 'xsd:string'),
	'urn:wsMateriales',            				// NAMESPACE
	'urn:wsMateriales#Eliminar',         		// ACCION SOAP
	'rpc',                        				// ESTILO
	'encoded',                    				// CODIFICADO
	'baja de materiales'
	);



$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
$server->service($HTTP_RAW_POST_DATA);


?>