<?php 

define("PATH", "../../../../../etc/squid3/");

class FileUtil {

	static function abreArquivo($nomeArquivo, $regras){
		$nomeArquivo = PATH . $nomeArquivo;
		$arquivo = fopen($nomeArquivo, "w");	

		fwrite($arquivo, $regras);

		fclose($arquivo);
	}

	static function geraArquivoConf($regras){
		$arquivo = "squid.conf";
		self::abreArquivo($arquivo, $regras);
	}

	static function geraArquivoAutenticacao(){
		self::abreArquivo("squid.conf", $regras);
	}

	static function excluiArquivo($arquivo){
		unlink($arquivo);
	}
}

?>
