<!DOCTYPE html>
<html>
<head>
	
	  <link rel="stylesheet" type="text/css" href="css/estilo.css">
	  <link rel="stylesheet" type="text/css" href="css/animacion.css">
	  <link rel="stylesheet" type="text/css" href="css/estiloCustom.css">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	  <script type="text/javascript" src="lib/jquery-1.9.1.min.js"></script>
	  <script type="text/javascript" src="appJs.js"></script>
  
</head>
<body>

<?php     
	
	if(isset($_POST['userName'])){
		$username = $_POST['userName'];
	} 
?>
<div class="container">
	<div>
		<button class="btn btn-info" style="float: left;" name="volver" onclick="volver()" >
				VOLVER
		</button>	
		<div class="alienar-izquierda" style="float: right; font-weight: bold;" >
			<?php echo isset($username) ?  $username : "" ; ?>	
		</div>	
	</div>

	<br>
	<div class="container" style="margin-top: 40px">
		<button class="btn btn-info" style="float: left;" name="volver" onclick="alta()" >
				ALTA MATERIALES
		</button>			
		<button class="btn btn-info" style="float: left;" name="volver" onclick="listarMateriales()" >
				LISTADO MATERIALES
		</button>		
	</div>

	<br>

	<div id="panelContenedor">
		
	</div>
	



</div>
	
	
	
</body>
</html>