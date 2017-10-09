<?php 

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
		$regras .= "cache_access_log /value/log/squid3/access.log \n";

		return $regras;
	}

	/**
		Bloqueia por usuário e senha
	*/
	function montaAutenticacao($usuario, $senha) {

		// Cria arquivo pra guardar usuário e senha
		shell_exec("touch /etc/squid3/squid_passwd");

		//Executa comando no shell para criar usuário
		$retorno = shell_exec("htpasswd /etc/squid3/squid_passwd {$usuario}");
			
		echo $retorno;
		// Cria senha
		shell_exec("{$senha}");

		$regraAutenticacao = "";

		$regraAutenticacao .= "auth_param basic realm squid \n";
		$regraAutenticacao .= "auth_param basic program /usr/lib/squid3/basic_ncsa_auth /etc/squid3/squid_passwd \n";

		$regraAutenticacao .= "acl autenticados proxy_auth REQUIRED";

		return $regraAutenticacao;
	}

	function montaRegrasPorRegex($nomeArquivo){
		$regra = "acl {$nomeArquivo} url_regex -i \"./etc/squid3/liberados\" ";
		return $regra;	
	}

	function montaRegrasPorIP($ipBloqueado, $nomeArquivo){
		$regra = "acl {$nomeArquivo} dst {$ipBloqueado}";
		return $regra;
	}

 ?>