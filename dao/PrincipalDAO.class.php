<?php 

include_once('Conexao.class.php');
include_once('../model/Principal.class.php');


class PrincipalDAO {
	
	public function insereRegras(Principal $p){
		try{
			$connection = Conexao::getConnection();

			$query = "INSERT INTO REGRAS (";
			$query .= "	SITES_LIBERADOS, LIBERADO_POR_IP, ";
			$query .= "	HORA_INICIAL, HORA_FINAL, USUARIO, SENHA, ";
			$query .= "	FG_POR_HORA, FG_POR_EXTENSAO, FG_POR_AUTENTICACAO, EXT_LIBERADAS, ";
			$query .= " OPT_POR_HORA, OPT_POR_IP, OPT_POR_EXT ";
			$query .= ")";
			$query .= " values ";
			$query .= " (:sites_liberados, :liberado_por_ip, ";
			$query .= " :hora_inicial, :hora_final, :usuario, :senha, ";
			$query .= " :fg_por_hora, :fg_por_extensao, :fg_por_autenticacao, :ext_liberadas, ";
			$query .= "  :opBloqHora, :opBloqIp, :opBloqExt ";
			$query .= ")";

			$stmt = $connection->prepare($query);

			$stmt->bindValue(':sites_liberados', $p->getSitesLiberados());
			$stmt->bindValue(':liberado_por_ip', $p->getIpLiberado());
			$stmt->bindValue(':hora_inicial', $p->getHrInicial());
			$stmt->bindValue(':hora_final', $p->getHrFim());
			$stmt->bindValue(':usuario', $p->getUsuario());
			$stmt->bindValue(':senha', $p->getSenha());
			$stmt->bindValue(':fg_por_hora', $p->getFgPorHora());
			$stmt->bindValue(':fg_por_extensao', $p->getFgPorExtensao());
			$stmt->bindValue(':fg_por_autenticacao', $p->getFgPorAutenticacao());
			$stmt->bindValue(':opBloqHora', $p->getOpBloqHora());
			$stmt->bindValue(':opBloqIp', $p->getOpBloqIp());
			$stmt->bindValue(':opBloqExt', $p->getOpBloqExt());

			$extensoes = "";
			if(!empty($p->getExtPNG())){
				$extensoes .= "{$p->getExtPNG()}";
			}

			if(!empty($p->getExtEXE())){
				$extensoes .= (strlen($extensoes) > 0) ? ";{$p->getExtEXE()}" : "{$p->getExtEXE()}";	
			}

			if(!empty($p->getExtPDF())){
				$extensoes .= (strlen($extensoes) > 0) ? ";{$p->getExtPDF()}" : "{$p->getExtPDF()}";
			}

			if(!empty($p->getExtGIF())){
				$extensoes .= (strlen($extensoes) > 0) ? ";{$p->getExtGIF()}" : "{$p->getExtGIF()}";
			}

			$stmt->bindValue(':ext_liberadas', $extensoes);

			$stmt->execute();

		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}


	public function atualizaRegras(Principal $p){

		try{
			$connection = Conexao::getConnection();

			$query = "UPDATE REGRAS SET";
			$query .= "	SITES_LIBERADOS = :sites_liberados, LIBERADO_POR_IP = :liberado_por_ip, ";
			$query .= "	HORA_INICIAL = :hora_inicial, HORA_FINAL = :hora_final, USUARIO = :usuario, SENHA = :senha, ";
			$query .= "	FG_POR_HORA = :fg_por_hora, FG_POR_EXTENSAO = :fg_por_extensao, FG_POR_AUTENTICACAO = :fg_por_autenticacao, EXT_LIBERADAS := :ext_liberadas, ";

			$query .= " OPT_POR_HORA = :opBloqHora, OPT_POR_IP = :opBloqIp, OPT_POR_EXT = :opBloqExt";

			$stmt = $connection->prepare($query);

			$stmt->bindValue(':sites_liberados', $p->getSitesLiberados());
			$stmt->bindValue(':liberado_por_ip', $p->getIpLiberado());
			$stmt->bindValue(':hora_inicial', $p->getHrInicial());
			$stmt->bindValue(':hora_final', $p->getHrFim());
			$stmt->bindValue(':usuario', $p->getUsuario());
			$stmt->bindValue(':senha', $p->getSenha());
			$stmt->bindValue(':fg_por_hora', $p->getFgPorHora());
			$stmt->bindValue(':fg_por_extensao', $p->getFgPorExtensao());
			$stmt->bindValue(':fg_por_autenticacao', $p->getFgPorAutenticacao());
			$stmt->bindValue(':opBloqHora', $p->getOpBloqHora());
			$stmt->bindValue(':opBloqIp', $p->getOpBloqIp());
			$stmt->bindValue(':opBloqExt', $p->getOpBloqExt());

			$extensoes = "";
			if(!empty($p->getExtPNG())){
				$extensoes .= "{$p->getExtPNG()}";
			}

			if(!empty($p->getExtEXE())){
				$extensoes .= (strlen($extensoes) > 0) ? ";{$p->getExtEXE()}" : "{$p->getExtEXE()}";	
			}

			if(!empty($p->getExtPDF())){
				$extensoes .= (strlen($extensoes) > 0) ? ";{$p->getExtPDF()}" : "{$p->getExtPDF()}";
			}

			if(!empty($p->getExtGIF())){
				$extensoes .= (strlen($extensoes) > 0) ? ";{$p->getExtGIF()}" : "{$p->getExtGIF()}";
			}

			$stmt->bindValue(':ext_liberadas', $extensoes);

			$stmt->execute();

		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function selecionaRegras(){

		try {
			$p = new Principal();
			$connection = Conexao::getConnection();

			$query = " SELECT SITES_LIBERADOS, LIBERADO_POR_IP, ";
			$query .= "	HORA_INICIAL, HORA_FINAL, USUARIO, SENHA, ";
			$query .= "	FG_POR_HORA, FG_POR_EXTENSAO, FG_POR_AUTENTICACAO, EXT_LIBERADAS, ";
			$query .= " OPT_POR_HORA, OPT_POR_IP, OPT_POR_EXT ";
			$query .= " FROM REGRAS ";

			$stmt = $connection->prepare($query);

			$stmt->execute();			

			if($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$p->setSitesLiberados($result['SITES_LIBERADOS']);
				$p->setIpLiberado($result['LIBERADO_POR_IP']);
				$p->setHrInicial($result['HORA_INICIAL']);
				$p->setHrFim($result['HORA_FINAL']);
				$p->setUsuario($result['USUARIO']);
				$p->setSenha($result['SENHA']);
				$p->setFgPorHora($result['FG_POR_HORA']);
				$p->setFgPorExtensao($result['FG_POR_EXTENSAO']);
				$p->setFgPorAutenticacao($result['FG_POR_AUTENTICACAO']);
				$p->setOpBloqIp($result['OPT_POR_IP']);
				$p->setOpBloqHora($result['OPT_POR_HORA']);
				$p->setOpBloqExt($result['OPT_POR_EXT']);

				$extensoes = $result['EXT_LIBERADAS'];

				$array_extensoes = explode(';', $extensoes);

				foreach ($array_extensoes as $valor) {

					if($valor === "extPDF"){
						$p->setExtPDF($valor);
					}else if($valor === "extPNG"){
						$p->setExtPNG($valor);
					}else if($valor === "extGIF"){
						$p->setExtGIF($valor);
					}else if($valor === "extEXE"){
						$p->setExtEXE($valor);
					}
				}
			}

			return $p;
			
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}
}


 ?>
