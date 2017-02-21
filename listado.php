<?php
	require_once('capaServidor/claseMaterial.php');

	$arrayDeMateriales = Material::TraerTodosLosMateriales();

	echo "<table class='table table-hover table-responsive'>
			<thead>
				<tr>
					<th>  Codigo   </th>				
					<th>  Nombre     </th>
					<th>  Precio   </th>
					<th>  Tipo        </th>
					<th>  BORRAR     </th>
					<th>  MODIFICAR  </th>
				</tr> 
			</thead>";   	

		foreach ($arrayDeMateriales as $material){

			echo " 	<tr>			
						<td>".$material->GetCodigo()."</td>
						<td>".$material->GetNombre()."</td>
						<td>".$material->GetPrecio()."</td>
						<td>".$material->GetTipo()."</td>
						<td><button class='btn btn-danger' name='Borrar' onclick='baja(".$material->GetCodigo().")'>   <span class='glyphicon glyphicon-remove-circle'>&nbsp;</span>Borrar</button></td>
						<td><button class='btn btn-warning' name='Modificar' onclick='modificacion(".$material->GetCodigo().")'><span class='glyphicon glyphicon-edit'>&nbsp;</span>Modificar</button></td>
					</tr>";
		}	
	echo "</table>";		
?>
