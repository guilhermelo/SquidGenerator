<?php 

/**
* 
*/
class FileGenerator {

	define("PATH", "/etc/squid3/");

	function criaArquivo($nomeArquivo, $regras){



		//Abre arquivo para escrever
		$arquivo = fopen($nomeArquivo, "w");	

		fwrite($arquivo, $regras);

		fclose($arquivo);
	}

	public static function geraArquivoConf($regras){
		
		abreArquivo(constant("PATH") . 'squid.conf', $regras);
	}

	public static function geraArquivoAutenticacao(){
		abreArquivo(constant("PATH") . 'squid.conf', $regras);	
	}
}
	

?>