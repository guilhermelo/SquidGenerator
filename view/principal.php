<?php require_once('../view/header.php'); ?>
		<div class="container">
			<form action="../controller/PrincipalController.php" method="POST">
				<div class="row">
					<h1>Squid Generator</h1>
				</div>
				<br/>
				<br/>
				<div class="row">
					<div class="col-md-4">
						<label for="liberadosHr"><p>Sites liberados: </p></label>	
						<textarea cols="10" rows="4" class="form-control" name="sitesLiberados"></textarea>
					</div>
					<div class="col-md-4">
						<div class="row">
							<label><p>Extensões bloqueadas</p></label>
						</div>
						<div class="col-md-2">
							<div class="row">
								<input type="checkbox" name="extExe" value=""> EXE
							</div>
							<div class="row">
								<input type="checkbox" name="extPNG" value=""> PNG
							</div>
						</div>
						<div class="col-md-2">
							<div class="row">
								<input type="checkbox" name="extPDF" value=""> PDF
							</div>
							<div class="row">
								<input type="checkbox" name="extGIF" value=""> GIF	
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="liberadosHr"><p>Sites bloqueados por IP: </p></label>	
						<textarea cols="10" rows="4" class="form-control" name="bloqPorIP"></textarea>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<input type="radio" name="porHora" value="" id="porHora">Definir por hora
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<label>Hora Inicial: </label>
						<input type="text" name="hrInicio" value="" id="hrInicio" class="form-control" disabled>	
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<label>Hora Final: </label>
						<input type="text" name="hrFim" value="" id="hrFim" class="form-control" disabled>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 submit">
						<input type="submit" name="" value="Salvar" class="btn btn-success">	
					</div>
				</div>
			</form>
		</div>
<?php include_once('footer.php'); ?>