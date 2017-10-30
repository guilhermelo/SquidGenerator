<?php 

	define('URL_FILE', '/etc/squid3/');

	function montaConfiguracoes($hostname, $qtdeMemRAM, $tamMaxArqRAM, $tamMaxArqDisco, 
		$tamMinArqDisco, $cacheSwapLow, $cacheSwapHigh, $tamArquivoCache, $qtdePastas, $qtdeSubPastas){

		$regras = "";

		if(!empty($hostname)){
			$regras .= "http_port 3128\n";
			$regras .= "visible_hostname {$hostname} \n";
		}

		if(!empty($qtdeMemRAM)){
			$regras .= "cache_mem {$qtdeMemRAM} MB \n";
		}

		if(!empty($tamMaxArqRAM)){
			$regras .= "maximum_object_size_in_memory {$tamMaxArqRAM} KB \n";
		}

		if(!empty($tamMaxArqDisco)){
			$regras .= "maximum_object_size {$tamMaxArqDisco} KB \n";	
		}

		if(!empty($tamMinArqDisco)){
			$regras .= "minimum_object_size {$tamMinArqDisco} KB \n";
		}

		if(!empty($cacheSwapLow)){
			$regras .= "cache_swap_low {$tamMaxArqDisco} \n";
		}

		if(!empty($cacheSwapHigh)){
			$regras .= "cache_swap_high {$cacheSwapHigh} \n";	
		}

		// Tamanho em MB do arquivo 
		// Quantidade de pastas
		// Quantidade de subpastas
		$regras .= "cache_dir ufs /var/spool/squid3 {$tamArquivoCache} {$qtdePastas} {$qtdeSubPastas} \n";
		$regras .= "cache_access_log /var/log/squid3/access.log \n";

//		$regras .= "acl localhost dst 192.168.0.1\n";
//		$regras .=  "http_access allow localhost \n";

		return $regras;
	}

	/**
		Bloqueia por usuário e senha
	*/
	function montaAutenticacao($usuario, $senha) {

		// Cria arquivo pra guardar usuário e senha
		$senha = shell_exec("sudo touch /etc/squid3/squid_passwd");

		//Executa comando no shell para criar usuário
		$retorno = shell_exec("htpasswd /etc/squid3/squid_passwd {$usuario}");

		// Cria senha
		shell_exec("{$senha}");

		$regraAutenticacao = "";

		$regraAutenticacao .= "auth_param basic realm squid \n";
		$regraAutenticacao .= "auth_param basic program /usr/lib/squid3/basic_ncsa_auth /etc/squid3/squid_passwd \n";

		$regraAutenticacao .= "acl liberado_auth proxy_auth REQUIRED \n";

		return $regraAutenticacao;
	}

	function montaRegrasPorRegex($nomeACL){
		$regra = "acl {$nomeACL} url_regex -i \"". URL_FILE . "liberados\" \n";
		return $regra;	
	}

	function montaRegraPorHora($hrInicio, $hrFim, $nomeACL){
		$regra = "acl {$nomeACL} time {$hrInicio}-{$hrFim} \n";
		return $regra;
	}

	function montaRegraPorExtensao($extensoes, $nomeACL){
		$regra = "acl {$nomeACL} url_regex -i {$extensoes} \n";
		return $regra;
	}

	function montaRegraIPSites($ip, $nomeACL){
		$regra = "acl {$nomeACL} dst {$ip}/255.255.255.255\n";
		return $regra;
	}
 ?>
