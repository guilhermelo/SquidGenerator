<?php 

	require_once('../view/header.php'); 
	require_once('../dao/PrincipalDAO.class.php');

	$principalDAO = new PrincipalDAO();

	$p = $principalDAO->selecionaRegras();

	echo "<pre>";
	print_r($p);
	echo "</pre>";

?>
		<hr>
		<div class="container">
			<form action="../controller/PrincipalController.php" method="POST">
				<div class="row">
					<h1>Squid Generator</h1>
				</div>
				<br/>
				<br/>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<label for="liberadosHr"><p>Sites: </p></label>	
						<textarea cols="10" rows="4" class="form-control" name="sitesLiberados"><?=$p->getSitesLiberados()?></textarea>
					</div>
					<div class="col-md-2">
						<label for="sitesPorIP"><p>IPs do site: </p></label>	
						<input type="text" class="form-control" name="sitesPorIP" value="<?= $p->getIpLiberado() ?>">
					</div>
					<div class="col-md-2">
						<label for="bloqIP" style="color: white;"><p>Selecionar</p></label>	
						<select name="bloqIP" class="form-control">
							<option value="lib" <?= $p->getOpBloqIp() === "1" ? "selected" : "" ?>>Liberar</option>
							<option value="bloq" <?= $p->getOpBloqIp() === "0" ? "selected" : "" ?>>Bloquear</option>
						</select>
					</div>
					<div class="col-md-2"></div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<input type="checkbox" name="porHora" value="porHora" id="porHora" <?= $p->getFgPorHora() === "S" ? "checked" : "" ?>>Definir por hora
					</div>
					<div class="col-md-6">
						<input type="checkbox" name="porExtensao" value="porExtensao" id="porExtensao" <?= $p->getFgPorExtensao() === "S" ? "checked" : "" ?>>Definir Extensões
					</div>
					<div class="col-md-3">
						<input type="checkbox" name="porAutenticacao" value="porAutenticacao" id="porAutenticacao" <?= $p->getFgPorAutenticacao() === "S" ? "checked" : "" ?>>Definir Autenticação
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-2">
						<select name="bloqHora" class="form-control">
							<option value="lib" <?= $p->getOpBloqHora() === "1" ? "selected" : "" ?>>
								Liberar
							</option>
							<option value="bloq" <?= $p->getOpBloqHora() === "0" ? "selected" : "" ?>>
								Bloquear
							</option>
						</select>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-2">
						<select name="bloqExtensao" class="form-control">
							<option value="lib" <?= $p->getOpBloqExt() === "1" ? "selected" : "" ?>>Liberar</option>
							<option value="bloq" <?= $p->getOpBloqExt() === "0" ? "selected" : "" ?>>Bloquear</option>
						</select>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-2">
						<label>Hora Inicial: </label>
						<input type="text" name="hrInicio" value="<?= $p->getHrInicial() ?>" id="hrInicio" class="form-control" disabled>	
					</div>
					<div class="col-md-5">
						<h3 style="text-align: center;">Extensões</h3>
					</div>
					<div class="col-md-5">
						<h3 style="text-align: center;">Autenticação por Usuário</h3>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-2">
						<label>Hora Final: </label>
						<input type="text" name="hrFim" value="<?= $p->getHrFim() ?>" id="hrFim" class="form-control" disabled>	
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-1">
						<input type="checkbox" name="extPNG" value="extPNG" id="extPNG" disabled <?= !empty($p->getExtPNG()) ? "checked" : "" ?>> PNG
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="extExe" value="extEXE" id="extExe" disabled <?= !empty($p->getExtEXE()) ? "checked" : "" ?>> EXE
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="extPDF" value="extPDF" id="extPDF" disabled <?= !empty($p->getExtPDF()) ? "checked" : "" ?>> PDF
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="extGIF" value="extGIF" id="extGIF" disabled <?= !empty($p->getExtGIF()) ? "checked" : "" ?>> GIF		
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-2">
						<label for="usuario">Usuário: </label>
						<input type="text" name="usuario" value="<?= $p->getUsuario() ?>" id="usuario" class="form-control" disabled>
					</div>
					<div class="col-md-2">
						<label for="senha">Senha: </label>
						<input type="text" name="senha" value="<?= $p->getSenha() ?>" id="senha" class="form-control" disabled>
					</div>	
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-1"></div>
					<div class="col-md-1">
						<div class="col-md-1">
							<input type="checkbox" name="extMP3" value="extMP3" id="extMP3" disabled  <?= !empty($p->getExtMP3()) ? "checked" : "" ?>> MP3
						</div>
					</div>
					<div class="col-md-1">
						<div class="col-md-1">
							<input type="checkbox" name="extMP4" value="extMP4" id="extMP4" disabled <?= !empty($p->getExtMP4()) ? "checked" : "" ?>> MP4
						</div>
					</div>
					<div class="col-md-1">
						<div class="col-md-1">
							<input type="checkbox" name="extJPG" value="extJPG" id="extJPG" disabled  <?= !empty($p->getExtJPG()) ? "checked" : "" ?>> JPG
						</div>
					</div>
					<div class="col-md-1">
						<div class="col-md-1">
							<input type="checkbox" name="extDOCX" value="extDOCX" id="extDOCX" disabled <?= !empty($p->getExtDOCX()) ? "checked" : "" ?>> DOCX
						</div>
					</div>
				</div>
				<br/>
				<hr>
				<div class="row">
					<div class="col-md-12 submit">
						<input type="submit" name="" value="Salvar" class="btn btn-success">	
					</div>
				</div>
			</form>
		</div>
<?php include_once('footer.php'); ?>
