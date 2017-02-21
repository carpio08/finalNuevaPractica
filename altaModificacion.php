<?php

if (isset($_POST['accion'])) {
	switch ($_POST['accion']) {
		case 'Alta':
			$codigo = "";
			$nombre = "";
			$precio = "";
			$tipo = "";				
			break;		
		case 'Modificacion':
			$codigo = $_POST['codigoModificar'];	
			$nombre = $_POST['nombre'];	
			$precio = $_POST['precio'];	
			$tipo = $_POST['tipo'];		   
			break;		
	}
}else{
}

?>


<div class="conteiner">
	<br>
	<input type="hidden" id="identificador" value="<?php echo $identificador; ?>" />
	
    <br>
    <input type="text" placeholder="Codigo" id="codigo" value="<?php echo $codigo; ?>" disabled />
    <br>
    <div>
    	<input type="text" placeholder="nombre" id="nombre" value="<?php echo $nombre; ?>" required/>
    	<span id="lblApellido" style="display:none;color:#FF0000;font-size:80">ingrese apellido</span>
    </div>
    
    <br>
    <input type="text" placeholder="precio" id="precio" value="<?php echo $precio; ?>" />
    <span id="lblprecio" style="display:none;color:#FF0000;font-size:80">ingrese precio</span>
    <br>
    <input type="text" placeholder="tipo" id="tipo" value="<?php echo $tipo; ?>" required/>
    <span id="lbltipo" style="display:none;color:#FF0000;font-size:80">ingrese tipo</span>
	<br>
	<button class="btn btn-info" style="float: left;" name="volver" onclick="Guardar(<?php echo $codigo; ?>)" >
		GUARDAR
	</button>	

</div>

