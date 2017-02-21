<?php


class User
{
	public $mail;
	public $pass;
	public $perfil;

	public function __construct()
	{		
		
	}

	public static function Leer()
	{
		$usuarios = array();

		$a = fopen("usuarios.txt", "r");
		
		while(!feof($a)){
			$arr = explode("/", fgets($a));							
			array_push($usuarios, $arr);			
		}
		fclose($a);		
		return $usuarios;		
	}

 }

?>