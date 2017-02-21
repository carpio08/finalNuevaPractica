<?php

if (isset($_POST['accion'])) {
	switch ($_POST['accion']) {
		case 'Alta':
			$codigo = "";
			$nombre = "";
			$precio = "";
			$tipo = "";				
			$selectSolido = false;
			$selectLiquido = false;			
			break;		
		case 'Modificacion':
			$codigo = $_POST['codigoModificar'];	
			$nombre = $_POST['nombre'];	
			$precio = $_POST['precio'];	

			if($_POST['tipo'] == "solido"){
				$selectSolido = "true";
				$selectLiquido = "false";
			}else{
				$selectSolido = "false";
				$selectLiquido = "true";
			}
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

	<select id="tipo" style="width:90%;">
	    <option value="solido"<?php if ($selectSolido == 'true') echo ' selected="true"'; ?> >Solido</option>
	    <option value="liquido"<?php if ($selectLiquido == 'true') echo ' selected="true"'; ?>>liquido</option>	   
	</select>
	<br>
	<button class="btn btn-info" style="float: left; margin-top:20px;" name="volver" onclick="Guardar(<?php echo $codigo; ?>)" >
		GUARDAR
	</button>	

</div>

