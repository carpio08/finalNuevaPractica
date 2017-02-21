
function init(){
	document.getElementById('user').value = "";
	$("input[type='password']").val('');
}


function ingresar(){
	$("#msjDeError").html("");
	if(!($("#form")[0][0].validity.valid)){
		$("#msjDeError").html("<font style='font-weight:bold; color:red' >Ingrese un email valido</font>");
		return;
	}
	if(!($("#form")[0][1].validity.valid)){
		$("#msjDeError").html("<font style='font-weight:bold; color:red' >Ingrese contrasena valido</font>");
		return;
	}
	var u = document.getElementById('user').value;
 	var p = document.getElementById('pass').value;
 	
	$.ajax({
	    type: 'POST',
	    url: "capaServidor/login.php",
	    data : {user: u, pass: p},
	        success: function(data, textStatus, jqXHR){
	            if(data == "loginFail"){	            	
	             	$("#msjDeError").html("<font style='font-weight:bold; color:red' >Error de usuario o contrasena</font>");
	            }else{
	            	$("#msjDeError").html("");
	            	CargarAbm(u)
	            }
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            $("#msjDeError").html("<font style='font-weight:bold; color:red' >errorThrown</font>");
	        }
	    });
}

function ingresarComoAdmin (){
	var username = "admin@admin.com";
	$.ajax({
	    type: 'POST',
	    url: "capaServidor/login.php",
	    data : {user: username, pass: '321'},
	        success: function(data, textStatus, jqXHR){
	        	$("#msjDeError").html("");
	            CargarAbm(username);
	            // $("#loginInput").html("");
	           //  CargarAbm();
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	             $("#msjDeError").html("<font style='font-weight:bold; color:red' >errorThrown</font>");
	        }
	    });
}

function BorrarCookies(){
	$.ajax({
	    type: 'POST',
	    url: "capaServidor/login.php",
	    data : {borrarCookies: true},
	        success: function(data, textStatus, jqXHR){
	           alert(data);
	            
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            $("#msjDeError").html("<font style='font-weight:bold; color:red' >errorThrown</font>");
	        }
	    });
}

function CargarAbm(userName){
	document.getElementById('userName').value = userName;
	document.frmApp.submit();
	//	window.location.href = "app.php?username:" + userName;      
}

