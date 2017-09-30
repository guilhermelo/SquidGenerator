<?php 

define("PATH", "/etc/squid3/");

class FileGenerator {

	private $contador = 0;

	static function abreArquivo($nomeArquivo, $sites){
		$nomeArquivo .= constant("PATH") . $nomeArquivo;
		$arquivo = fopen($nomeArquivo, "w");	

		fwrite($arquivo, $sites);

		fclose($arquivo);
	}

	static function geraArquivoConf($regras){
		$arquivo = "squid.conf";
		FileGenerator::abreArquivo($arquivo, $regras);
	}

	static function geraArquivoAutenticacao(){
		FileGenerator::abreArquivo(constant("PATH") . "squid.conf", $regras);	
	}
}

?>