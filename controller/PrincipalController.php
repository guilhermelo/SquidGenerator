<?php 
	require("../util/FileUtil.class.php");
	require("../model/Principal.class.php");
	require("../dao/PrincipalDAO.class.php");
	require("../dao/ConfiguracaoDAO.class.php");
	require("../helper/helpers.php");
	
	//ACL
	$ACLporHora = "regra_porhora";
	$ACLporExtensao = "regra_porextensao";
	$ACLLiberados = "liberados";
	$ACLPorIP = "ip_bloqueado";
	$ACLLiberadoAUTH = "liberado_auth";

	//Variáveis globais
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
	$extMP3 = filter_input(INPUT_POST, 'extMP3');
	$extMP4 = filter_input(INPUT_POST, 'extMP4');
	$extJPG = filter_input(INPUT_POST, 'extJPG');
	$extDOCX = filter_input(INPUT_POST, 'extDOCX');


	$usuario = filter_input(INPUT_POST, 'usuario');
	$senha = filter_input(INPUT_POST, 'senha');

	//dropdowns de escolhas
	$opBloqHora = filter_input(INPUT_POST, 'bloqHora');
	$opBloqIp = filter_input(INPUT_POST, 'bloqIP');
	$opBloqExt = filter_input(INPUT_POST, 'bloqExtensao');

	$confDAO = new ConfiguracaoDAO();
	$conf = $confDAO->selecionarConfiguracao();

	$regras .= montaConfiguracoes($conf->getHostname(), $conf->getQtdeRam(), $conf->getTamMaxArqRam(), $conf->getTamMaxArqDisco(), $conf->getTamMinArqDisco(), $conf->getPercMinCacheSwap(), $conf->getPercMaxCacheSwap(), $conf->getTamArquivoCache(), $conf->getQtdePastas(), $conf->getQtdeSubPastas());

	//Verificação do usuário para autenticação
	if(isset($usuario) && isset($senha)){
		$regras .= montaAutenticacao($usuario, $senha);
	}

	if(isset($porHora)){
		$regras .= montaRegraPorHora($hrInicio, $hrFim, $ACLporHora);
	} 

	if(isset($porExtensao) && (!empty($porHora) || !empty($porExtensao) || !empty($porAutenticacao))) {
		$extensoes = "";

		if(isset($extPNG)){
			$extensoes .= " \\.png";
		}

		if(isset($extExe)){
			$extensoes .= " \\.exe";
		}

		if(isset($extPDF)){
			$extensoes .= " \\.pdf";
		}

		if(isset($extGIF)){
			$extensoes .= " \\.gif";
		}

		if(isset($extMP3)){
			$extensoes .= " \\.mp3";
		}

		if(isset($extMP4)){
			$extensoes .= " \\.mp4";
		}

		if(isset($extJPG)){
			$extensoes .= " \\.jpg";
		}

		if(isset($extDOCX)){
			$extensoes .= " \\.docx";
		}

		$regras .= montaRegraPorExtensao($extensoes, $ACLporExtensao);
	}

	if(!empty($sitesLiberados)){
		$regras .= montaRegrasPorRegex($ACLLiberados);
		$arquivoLiberados = $ACLLiberados;

		//Gera arquivo com sites liberados
		FileUtil::abreArquivo($arquivoLiberados, $sitesLiberados);
	}

	// Site liberado por IP
	if(!empty($sitesPorIP)){
		$regras .= montaRegraIPSites($sitesPorIP, $ACLPorIP);
	}

	if(empty($porExtensao) && empty($sitesPorIP) && !empty($sitesLiberados)){

		if(isset($opBloqHora) && $opBloqHora === 'lib'){
			$denyOrAllow = 'allow';
		}else if (isset($opBloqHora) && $opBloqHora === 'bloq'){
			$denyOrAllow = 'deny';
		}

		$regras .= "http_access {$denyOrAllow} {$ACLLiberados}";

		/*if(!empty($porExtensao)){
			$regras .= " {$ACLporExtensao}";
		}*/

		if(!empty($porHora)){
			$regras .= " {$ACLporHora}";
		}

		$regras .= "\n";
	}


	if(!empty($porExtensao) && !empty($sitesPorIP)){
	    $regras .= "http_access deny {$ACLporExtensao} {$ACLPorIP}";
	} else if(!empty($sitesPorIP)){

		if(isset($opBloqIp) && $opBloqIp === 'lib'){
			$denyOrAllow = 'allow';
		}else{
			$denyOrAllow = 'deny';
		}

	    $regras .= "http_access {$denyOrAllow} {$ACLPorIP}";
	} else if(!empty($porExtensao)){

		if(isset($opBloqExt) && $opBloqExt === 'lib'){
			$denyOrAllow = 'allow';
		}else{
			$denyOrAllow = 'deny';
		}

	    $regras .= "http_access {$denyOrAllow} {$ACLporExtensao} ";
	} else if(!empty($usuario) && !empty($senha)){
	    $regras .= "http_access allow {$ACLLiberadoAUTH}";
	}

	$principal = new Principal();

	$principal->setSitesLiberados($sitesLiberados);
	$principal->setIpLiberado($sitesPorIP);
	$principal->setFgPorHora(!empty($porHora) ? "S" : "N");
	$principal->setFgPorExtensao(!empty($porExtensao) ? "S" : "N");
	$principal->setFgPorAutenticacao(!empty($porAutenticacao) ? "S" : "N");
	$principal->setHrInicial($hrInicio);
	$principal->setHrFim($hrFim);
	$principal->setExtEXE(!empty($extPNG) ? "extEXE" : "");
	$principal->setExtPNG(!empty($extPNG) ? "extPNG" : "");
	$principal->setExtPDF(!empty($extPDF) ? "extPDF" : "");
	$principal->setExtGIF(!empty($extGIF) ? "extGIF" : "");
	$principal->setExtMP3(!empty($extMP3) ? "extMP3" : "");
	$principal->setExtMP4(!empty($extMP4) ? "extMP4" : "");
	$principal->setExtJPG(!empty($extJPG) ? "extJPG" : "");
	$principal->setExtDOCX(!empty($extDOCX) ? "extDOCX" : "");


	$principal->setUsuario($usuario);
	$principal->setSenha($senha);

	if(isset($opBloqHora) && $opBloqHora == 'lib'){
		$principal->setOpBloqHora('1');	
	}else{
		$principal->setOpBloqHora('0');	
	}
	
	if(isset($opBloqIp) && $opBloqIp == 'lib'){
		$principal->setOpBloqIp('1');	
	}else{
		$principal->setOpBloqIp('0');	
	}

	if(isset($opBloqExt) && $opBloqExt == 'lib'){
		$principal->setOpBloqExt('1');	
	}else{
		$principal->setOpBloqExt('0');	
	}

	$principalDAO = new PrincipalDAO();

	$objeto = $principalDAO->selecionaRegras();

	if(is_null($objeto->getSitesLiberados())) {
		$principalDAO->insereRegras($principal);
	}else{
		$principalDAO->atualizaRegras($principal);
	}
	

	//Gera arquivo de configuração do SQUID
	FileUtil::geraArquivoConf($regras);

	shell_exec(" sudo service squid3 restart ");

	header('Location: ../view/principal.php');
 ?>
