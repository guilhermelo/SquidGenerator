<?php 

define('USUARIO', 'admin');
define('SENHA', '');

class Conexao{

	private $instance;
	
	public static function getConnection(){
		if(is_null($instance)){
			$instance = new PDO('mysql:host=localhost;dbname=squid_generator', USUARIO, SENHA);
		}

		return $instance;
	}
}

 ?>