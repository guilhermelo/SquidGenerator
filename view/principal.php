<?php require_once('../view/header.php'); ?>
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
						<label for="liberadosHr"><p>Sites liberados: </p></label>	
						<textarea cols="10" rows="4" class="form-control" name="sitesLiberados"></textarea>
					</div>
					<div class="col-md-4">
						<label for="sitesPorIP"><p>Sites bloqueados por IP: </p></label>	
						<textarea cols="10" rows="4" class="form-control" name="sitesPorIP"></textarea>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<input type="radio" name="porHora" value="" id="porHora">Definir por hora
					</div>
					<div class="col-md-6">
						<input type="radio" name="porExtensao" value="" id="porExtensao">Definir Extensões
					</div>
					<div class="col-md-3">
						<input type="radio" name="porAutenticacao" value="" id="porAutenticacao">Definir Autenticação
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-2">
						<label>Hora Inicial: </label>
						<input type="text" name="hrInicio" value="" id="hrInicio" class="form-control" disabled>	
					</div>
					<div class="col-md-5">
						<h3 style="text-align: center;">Extensões bloqueadas</h3>
					</div>
					<div class="col-md-5">
						<h3 style="text-align: center;">Autenticação por Usuário</h3>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-2">
						<label>Hora Final: </label>
						<input type="text" name="hrFim" value="" id="hrFim" class="form-control" disabled>	
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-1">
						<input type="checkbox" name="extPNG" value="" id="extPNG" disabled> PNG
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="extExe" value="" id="extExe" disabled> EXE
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="extPDF" value="" id="extPDF" disabled> PDF
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="extGIF" value="" id="extGIF" disabled> GIF		
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-2">
						<label for="usuario">Usuário: </label>
						<input type="text" name="usuario" value="" id="usuario" class="form-control" disabled>
					</div>
					<div class="col-md-2">
						<label for="senha">Senha: </label>
						<input type="text" name="senha" value="" id="senha" class="form-control" disabled>
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