<?php 
	require("../util/FileUtil.class.php");
	require("../model/Configuracao.class.php");
	
	//Variáveis globais
	$arquivoLiberados = "liberados";

	$sitesLiberados = filter_input(INPUT_POST, 'liberados');
	$hrInicio = filter_input(INPUT_POST, 'hrInicio');
	$hrFim = filter_input(INPUT_POST, 'hrFim');


	$regras = montaURLRegex($arquivoLiberados);

	//Gera arquivo com sites liberados
	FileGenerator::abreArquivo($arquivoLiberados, $sitesLiberados);

	//Gera arquivo de configuração do SQUID
	FileGenerator::geraArquivoConf($regras);

	function montaURLRegex($nomeArquivo){
		$regra = "acl {$nomeArquivo} url_regex -i \"./etc/squid3/liberados\" ";
		$regra .= "http_access allow {$nomeArquivo}";
		$regra .= "http_access deny all";

		return $regra;
	}
 ?>