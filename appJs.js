function volver(){
		window.location.href = "index.html";  
		var hola ="";
}

function alta(){
	$.ajax({
	    type: 'POST',
	        url: "altaModificacion.php",
	        dataType: "html",
	        data : { accion: "Alta"},
		        success: function(data, textStatus, jqXHR){
		           $("#panelContenedor").html(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown){
		            console.log(errorThrown);
		        }
    	});    
}

function modificacion(codigo){	
	$.ajax({
		    type: 'POST',
		    url: "capaServidor/wsNexoCliente.php",
	        data : { accion: "Modificacion", codigoModifcar: codigo},
		        success: function(data, textStatus, jqXHR){
		        	var material = data.split(',');
		        	$.ajax({
					    type: 'POST',
					        url: "altaModificacion.php",
					        dataType: "html",
					        data : { accion: "Modificacion", codigoModificar: material[0], nombre: material[1], precio: material[2], tipo: material[3]},
						        success: function(data, textStatus, jqXHR){
						           $("#panelContenedor").html(data);
						        },
						        error: function(jqXHR, textStatus, errorThrown){
						            console.log(errorThrown);
						        }
				    	});    
		        },
		        error: function(jqXHR, textStatus, errorThrown){
		            console.log(errorThrown);
		        }
	   	});	
}

function baja(codigo){
	$.ajax({
		    type: 'POST',
		    url: "capaServidor/wsNexoCliente.php",
	        data : { accion: "Baja", codigoBaja: codigo },
		        success: function(data, textStatus, jqXHR){
		        	if(data == "OK"){
		        		alert("registro eliminado con exito");
		        		listarMateriales();
		        	}
		        },
		        error: function(jqXHR, textStatus, errorThrown){
		            console.log(errorThrown);
		        }
	});	
}		


function listarMateriales(){
	$.ajax({
	    type: 'POST',
	        url: "listado.php",
	        dataType: "html",	      
		        success: function(data, textStatus, jqXHR){
		           $("#panelContenedor").html(data);
		        },
		        error: function(jqXHR, textStatus, errorThrown){
		            console.log(errorThrown);
		        }
    	});    
	
}

function Guardar(codigo){
	var valido = validarInputs()
	if(valido){
		var nom = document.getElementById('nombre').value;
		var pre = document.getElementById('precio').value;
		var tip = document.getElementById('tipo').value;
		if(codigo){
			$.ajax({
		    type: 'POST',
		    url: "capaServidor/wsNexoCliente.php",
	        data : { accion: "Modificar", codigo: codigo, nombre: nom, precio: pre, tipo: tip},
		        success: function(data, textStatus, jqXHR){
		        	if(data == "OK"){
		        		alert("registro guardado con exito");
		        		 $("#panelContenedor").html("");
		        	}
		        },
		        error: function(jqXHR, textStatus, errorThrown){
		            console.log(errorThrown);
		        }
	   		});	

		}else{
			$.ajax({
		    type: 'POST',
		    url: "capaServidor/wsNexoCliente.php",
	        data : { accion: "Alta", nombre: nom, precio: pre, tipo: tip},
		        success: function(data, textStatus, jqXHR){
		        	if(data == "OK"){
		        		alert("registro guardado con exito");
		        		 $("#panelContenedor").html("");
		        	}
		        },
		        error: function(jqXHR, textStatus, errorThrown){
		            console.log(errorThrown);
		        }
	   		});	
		}		
	}	    
}

function validarInputs(){
	var retorno = true
	if(!document.getElementById('nombre').value){
		document.getElementById('lblApellido').style.display = "block";
		retorno = false;
	}else{
		document.getElementById('lblApellido').style.display = "none";
	}
	if(!document.getElementById('precio').value){
		document.getElementById('lblprecio').style.display = "block";
		retorno = false;
	}else{
		document.getElementById('lblprecio').style.display = "none";
	}
	if(!document.getElementById('tipo').value){
		document.getElementById('lbltipo').style.display = "block";
		retorno = false;
	}else{
		document.getElementById('lbltipo').style.display = "none";
	}
	return retorno;
}