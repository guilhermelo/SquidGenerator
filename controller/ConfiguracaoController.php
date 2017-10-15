<?php 
	require_once("../util/FileUtil.class.php");
	require_once("../helper/helpers.php");
	require_once("../model/Configuracao.class.php");
	require_once("../dao/ConfiguracaoDAO.class.php");

	$hostname = filter_input(INPUT_POST, 'hostname');
	$qtdeMemRAM = filter_input(INPUT_POST, 'qtdeMemRAM');
	$tamMaxArqRAM = filter_input(INPUT_POST, 'tamMaxArqRAM');
	$tamMaxArqDisco = filter_input(INPUT_POST, 'tamMaxArqDisco');
	$tamMinArqDisco = filter_input(INPUT_POST, 'tamMinArqDisco');
	$cacheSwapLow = filter_input(INPUT_POST, 'cacheSwapLow');
	$cacheSwapHigh = filter_input(INPUT_POST, 'cacheSwapHigh');
	$tamArquivoCache = filter_input(INPUT_POST, 'tamArquivoCache'); 
	$qtdePastas = filter_input(INPUT_POST, 'qtdePastas');
	$qtdeSubPastas = filter_input(INPUT_POST, 'qtdeSubPastas');

	$regrasFinais = "";


	$conf = new Configuracao();

	$conf->setHostname($hostname);
	$conf->setQtdeRam($qtdeMemRAM);
	$conf->setTamMaxArqRam($tamMaxArqRAM);
	$conf->setTamMaxArqDisco($tamMaxArqDisco);
	$conf->setTamMinArqDisco($tamMinArqDisco);
	$conf->setPercMinCacheSwap($cacheSwapLow);
	$conf->setPercMaxCacheSwap($cacheSwapHigh);
	$conf->setTamArquivoCache($tamArquivoCache);
	$conf->setQtdePastas($qtdePastas);
	$conf->setQtdeSubPastas($qtdeSubPastas);

	$daoConfiguracao = new ConfiguracaoDAO();

	if($daoConfiguracao->existeConfiguracao($conf->getHostname())) {
		$daoConfiguracao->alteraConfiguracao($conf);
	} else {
		$daoConfiguracao->insereConfiguracao($conf);
	}

//	$regrasFinais .= montaAutenticacao();

//	FileUtil::geraArquivoConf($regrasFinais);

	shell_exec("service squid3 restart");

	header('Location: ../view/configuracao.php');


?>
