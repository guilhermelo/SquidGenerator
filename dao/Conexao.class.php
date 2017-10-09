<?php 

define('USUARIO', 'guilherme');
define('SENHA', 'guilherme');

class Conexao{

	private static $instance;

	private function __construct(){}
	
	public static function getConnection(){
		if(empty(self::$instance)){
			self::$instance = new PDO('mysql:host=localhost;dbname=squid_generator', USUARIO, SENHA);
		}

		return self::$instance;
	}
}

 ?>