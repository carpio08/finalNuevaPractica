<?php

require_once("logClass.php");

if(isset($_POST['user'])){
	$listaUsuarios = User::Leer();	
	$retorno = "loginFail";
	foreach ($listaUsuarios as $user) {
		$u = explode(",", $user[0]);	
		if($u[0] == $_POST['user']){
			if($u[1] == $_POST['pass']){
				$retorno = $u[0];
				setcookie("nombreCookie", $retorno, time() + (86400 * 30), "/");
			}

		}
	}
	echo $retorno;
}

if(isset($_POST['borrarCookies'])){
	if($_POST['borrarCookies']){
		if (isset($_COOKIE['nombreCookie'])) {
	    		unset($_COOKIE['nombreCookie']);
	    		setcookie('nombreCookie', null, -1, '/');
	    		echo "Coockie borrada";
	     	}else{
	     		echo "No hay cookies para borrar";
	     	}
	}
}

?>