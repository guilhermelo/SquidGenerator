<?php 
	require("../util/FileUtil.class.php");
	require("../model/Configuracao.class.php");
	
	//Variáveis globais
	$arquivoLiberados = "liberados";
	$arquivoIPSBloqueados = "ips_bloqueados"; 
	$regras = "";

	$sitesLiberados = filter_input(INPUT_POST, 'sitesLiberados');
	$sitesPorIP = filter_input(INPUT_POST, 'sitesPorIP');
	$hrInicio = filter_input(INPUT_POST, 'hrInicio');
	$hrFim = filter_input(INPUT_POST, 'hrFim');
	$porHora = filter_input(INPUT_POST, 'porHora');
	$porExtensao = filter_input(INPUT_POST, 'porExtensao');
	$porAutenticacao = filter_input(INPUT_POST, 'porAutenticacao');
	$extPNG = filter_input(INPUT_POST, 'extPNG');
	$extExe = filter_input(INPUT_POST, 'extExe');
	$extPDF = filter_input(INPUT_POST, 'extPDF');
	$extGIF = filter_input(INPUT_POST, 'extGIF');
	$usuario = filter_input(INPUT_POST, 'usuario');
	$senha = filter_input(INPUT_POST, 'senha');

	if(!empty($sitesLiberados)){
		$regras .= montaRegrasPorRegex($arquivoLiberados);	
		//Gera arquivo com sites liberados
		FileUtil::abreArquivo($arquivoLiberados, $sitesLiberados);
	}

	if(!empty($bloqPorIP)){
		$regras .= montaRegrasPorIP($ipBloqueado, $arquivoIPSBloqueados);
		//Gera arquivo com sites bloqueados para um IP
		FileUtil::abreArquivo($arquivoIPSBloqueados, $sitesPorIP);
	}

	//Gera arquivo de configuração do SQUID
	FileUtil::geraArquivoConf($regras);
 ?>