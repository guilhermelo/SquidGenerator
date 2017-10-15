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
	$ACLPorIP = "ip_liberado";

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
	$usuario = filter_input(INPUT_POST, 'usuario');
	$senha = filter_input(INPUT_POST, 'senha');

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
			$extensoes .= " .png";
		}

		if(isset($extExe)){
			$extensoes .= " .exe";
		}

		if(isset($extPDF)){
			$extensoes .= " .pdf";
		}

		if(isset($extGIF)){
			$extensoes .= " .gif";
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

	if(empty($porExtensao)){

		$regras .= "http_access allow {$ACLLiberados}";

		/*if(!empty($porExtensao)){
			$regras .= " {$ACLporExtensao}";
		}*/

		if(!empty($porHora)){
			$regras .= " {$ACLporHora}";
		}

		if(!empty($sitesPorIP)){
			$regras .= " {$ACLPorIP}";
		}


		$regras .= "\n";
	}

//	$regras .= "http_access deny all\n";

	if(!empty($porExtensao)){
	    $regras .= "http_access allow all";
	    $regras .= "http_access deny {$ACLporExtensao}";
	}else{
	    $regras .= "http_access deny all\n";
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
	$principal->setUsuario($usuario);
	$principal->setSenha($senha);

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
