<?php 

include_once('Conexao.class.php');
include_once('../model/Configuracao.class.php');

class ConfiguracaoDAO{
	
	public function insereConfiguracao(Configuracao $conf){
		try {
			$connection = Conexao::getConnection();

			$query = " INSERT INTO CONFIGURACAO (HOSTNAME, QTDE_RAM, TAM_MAX_ARQ_RAM, TAM_MAX_ARQ_DISCO, ";
			$query .= " TAM_MIN_ARQ_DISCO, PERC_MIN_CACHE_SWAP, PERC_MAX_CACHE_SWAP, TAM_ARQUIVO_CACHE, QTDE_PASTAS, QTDE_SUB_PASTAS) ";
			$query .= " VALUES (:hostname, :qtde_ram, :tam_max_arq_ram, :tam_max_arq_disco, :tam_min_arq_disco, :perc_min_cache_swap, :perc_max_cache_swap, :tam_arquivo_cache, :qtde_pastas, :qtde_sub_pastas) ";


			$stmt = $connection->prepare($query);

			$stmt->bindValue(':hostname', $conf->getHostname());
			$stmt->bindValue(':qtde_ram', $conf->getQtdeRam());
			$stmt->bindValue(':tam_max_arq_ram', $conf->getTamMaxArqRam());
			$stmt->bindValue(':tam_max_arq_disco', $conf->getTamMaxArqDisco());
			$stmt->bindValue(':tam_min_arq_disco', $conf->getTamMinArqDisco());
			$stmt->bindValue(':perc_min_cache_swap', $conf->getPercMinCacheSwap());
			$stmt->bindValue(':perc_max_cache_swap', $conf->getPercMaxCacheSwap());
			$stmt->bindValue(':tam_arquivo_cache', $conf->getTamArquivoCache());
			$stmt->bindValue(':qtde_pastas', $conf->getQtdePastas());
			$stmt->bindValue(':qtde_sub_pastas', $conf->getQtdeSubPastas());
			$stmt->bindValue(':usuario', $conf->getUsuario());
			$stmt->bindValue(':senha', $conf->getSenha());

			$stmt->execute();

		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function existeConfiguracao($hostname){
		try {

			$connection = Conexao::getConnection();

			$query = " SELECT HOSTNAME FROM CONFIGURACAO";

			$stmt = $connection->prepare($query);

			$stmt->execute();

			$result = $stmt->fetchAll();

			if(!empty($result)){
				return true;
			}else{
				return false;	
			}
		} catch (PDOException $e) {
			print($e->getMessage());		
		}
	}

	public function alteraConfiguracao(Configuracao $conf){
		try {
			$connection = Conexao::getConnection();

			$query = " UPDATE CONFIGURACAO SET HOSTNAME = :hostname, QTDE_RAM = :qtde_ram, ";
			$query .= " TAM_MAX_ARQ_RAM = :tam_max_arq_ram, TAM_MAX_ARQ_DISCO = :tam_max_arq_disco, ";
			$query .= " TAM_MIN_ARQ_DISCO = :tam_min_arq_disco , PERC_MIN_CACHE_SWAP = :perc_min_cache_swap, TAM_ARQUIVO_CACHE = :tam_arquivo_cache, QTDE_PASTAS = :qtde_pastas, QTDE_SUB_PASTAS = :qtde_sub_pastas ";
			$query .= ", PERC_MAX_CACHE_SWAP = :perc_max_cache_swap ";
			$query .= " WHERE HOSTNAME = :hostname";



			$stmt = $connection->prepare($query);

			$stmt->bindValue(':hostname', $conf->getHostname());
			$stmt->bindValue(':qtde_ram', $conf->getQtdeRam());
			$stmt->bindValue(':tam_max_arq_ram', $conf->getTamMaxArqRam());
			$stmt->bindValue(':tam_max_arq_disco', $conf->getTamMaxArqDisco());
			$stmt->bindValue(':tam_min_arq_disco', $conf->getTamMinArqDisco());
			$stmt->bindValue(':perc_min_cache_swap', $conf->getPercMinCacheSwap());
			$stmt->bindValue(':perc_max_cache_swap', $conf->getPercMaxCacheSwap());
			$stmt->bindValue(':tam_arquivo_cache', $conf->getTamArquivoCache());
			$stmt->bindValue(':qtde_pastas', $conf->getQtdePastas());
			$stmt->bindValue(':qtde_sub_pastas', $conf->getQtdeSubPastas());	

			if($stmt->execute()){
				print("Update realizado!");
			}

		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function selecionarConfiguracao(){

		try {
			$conf = new Configuracao();
			$connection = Conexao::getConnection();

			$query = " SELECT HOSTNAME, QTDE_RAM, TAM_MAX_ARQ_RAM, TAM_MAX_ARQ_DISCO, ";
			$query .= " TAM_MIN_ARQ_DISCO, PERC_MIN_CACHE_SWAP, PERC_MAX_CACHE_SWAP, ";
			$query .= " TAM_ARQUIVO_CACHE, QTDE_PASTAS, QTDE_SUB_PASTAS";
			$query .= " FROM CONFIGURACAO ";

			$stmt = $connection->prepare($query);

			$stmt->execute();			

			if($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$conf->setHostname($result['HOSTNAME']);
				$conf->setQtdeRam($result['QTDE_RAM']);
				$conf->setTamMaxArqRam($result['TAM_MAX_ARQ_RAM']);
				$conf->setTamMaxArqDisco($result['TAM_MAX_ARQ_DISCO']);
				$conf->setTamMinArqDisco($result['TAM_MIN_ARQ_DISCO']);
				$conf->setPercMinCacheSwap($result['PERC_MIN_CACHE_SWAP']);
				$conf->setPercMaxCacheSwap($result['PERC_MAX_CACHE_SWAP']);
				$conf->setTamArquivoCache($result['TAM_ARQUIVO_CACHE']);
				$conf->setQtdePastas($result['QTDE_PASTAS']);
				$conf->setQtdeSubPastas($result['QTDE_SUB_PASTAS']);
			}

			return $conf;
			
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}
}

 ?>