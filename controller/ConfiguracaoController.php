<?php 
	require_once("../util/FileUtil.class.php");
	require_once("../model/Configuracao.class.php");
	require_once("../dao/ConfiguracaoDAO.class.php");

	$hostname = filter_input(INPUT_POST, 'hostname');
	$qtdeMemRAM = filter_input(INPUT_POST, 'qtdeMemRAM');
	$tamMaxArqRAM = filter_input(INPUT_POST, 'tamMaxArqRAM');
	$tamMaxArqDisco = filter_input(INPUT_POST, 'tamMaxArqDisco');
	$tamMinArqDisco = filter_input(INPUT_POST, 'tamMinArqDisco');
	$cacheSwapLow = filter_input(INPUT_POST, 'cacheSwapLow');
	$cacheSwapHigh = filter_input(INPUT_POST, 'cacheSwapHigh');


	$conf = new Configuracao($hostname, $qtdeRam, $tamMaxArqRam, $tamMaxArqDisco, $tamMinArqDisco, $percMinCacheSwap, $percMaxCacheSwap);

	$daoConfiguracao = new ConfiguracaoDAO();

	print_r($conf);
	$daoConfiguracao->insereConfiguracao($conf);
	echo "Uhu";

?>