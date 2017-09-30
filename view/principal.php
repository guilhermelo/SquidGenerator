<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/principal.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="principal.php">
		        <span>Squid Generator</span>
		      </a>
		      <ul class="nav navbar-nav">
			    <li>
			    	<a href="principal.php">Configuração</a>
			    </li>
			    <li>
			    	<a href="#">Bloqueio de Acesso</a>
			    </li>
			    <li>
			    	<a href="#">Relatório</a>
			    </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container">
			<form action="../controller/PrincipalController.php" method="POST">
				<div class="row">
					<div class="col-md-4">
					<h1>Squid Generator</h1>
						<label for="liberadosHr"><p>Sites liberados por horário</p></label>	
						<textarea cols="10" rows="4" class="form-control" name="liberadosHr"></textarea>
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
	</body>	
	<script type="text/javascript" src="js/controles.js"></script>
</html>