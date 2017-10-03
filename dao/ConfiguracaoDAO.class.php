<?php 

include_once('Conexao.class.php');
include_once('../model/Configuracao.class.php');

class ConfiguracaoDAO{
	
	public function insereConfiguracao(Configuracao $conf){
		try {
			$connection = Conexao::getConnection();

			$query = " INSERT INTO CONFIGURACAO (HOSTNAME, QTDE_RAM, TAM_MAX_ARQ_RAM, TAM_MAX_ARQ_DISCO, ";
			$query .= " TAM_MIN_ARQ_DISCO, PERC_MIN_CACHE_SWAP, PERC_MAX_CACHE_SWAP) ";
			$query .= " VALUES (:hostname, :qtde_ram, :tam_max_arq_ram, :tam_max_arq_disco, :tam_min_arq_disco, :perc_min_cache_swap, perc_max_cache_swap) ";


			$stmt = $connection->prepare($query);

			$stmt->bindValue(':hostname', $conf->getHostname());
			$stmt->bindValue(':qtde_ram', $conf->getQtdeRam());
			$stmt->bindValue(':tam_max_arq_ram', $conf->getTamMaxArqRam());
			$stmt->bindValue(':tam_max_arq_disco', $conf->getTamMaxArqDisco());
			$stmt->bindValue(':tam_min_arq_disco', $conf->getTamMinArqDisco());
			$stmt->bindValue(':perc_min_cache_swap', $conf->getPercMinCacheSwap());
			$stmt->bindValue(':perc_max_cache_swap', $conf->getPercMaxCacheSwap());

			$stmt->execute();

		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function alteraConfiguracao(Configuracao $conf){
		try {
			$connection = Conexao::getConnection();

			$query = " UPDATE CONFIGURACAO SET HOSTNAME = :hostname, QTDE_RAM = :qtde_ram, ";
			$query .= " TAM_MAX_ARQ_RAM = :tam_max_arq_ram, TAM_MAX_ARQ_DISCO = :tam_max_arq_disco, ";
			$query .= " TAM_MIN_ARQ_DISCO = :tam_min_arq_disco , PERC_MIN_CACHE_SWAP = :perc_min_cache_swap ";
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
			$query .= " TAM_MIN_ARQ_DISCO, PERC_MIN_CACHE_SWAP, PERC_MAX_CACHE_SWAP ";
			$query .= " FROM CONFIGURACAO ";


			$stmt = $connection->prepare($query);

			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if(!empty($result)){
				$conf->setHostname($result['HOSTNAME']);
				$conf->setQtdeRam($result['QTDE_RAM']);
				$conf->setTamMaxArqRam($result['TAM_MAX_ARQ_RAM']);
				$conf->setTamMaxArqDisco($result['TAM_MAX_ARQ_DISCO']);
				$conf->setTamMinArqDisco($result['TAM_MIN_ARQ_DISCO']);
				$conf->setPercMinCacheSwap($result['PERC_MIN_CACHE_SWAP']);
				$conf->setPercMaxCacheSwap($result['PERC_MAX_CACHE_SWAP']);
			}

			return $conf;
			
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}
}

 ?>