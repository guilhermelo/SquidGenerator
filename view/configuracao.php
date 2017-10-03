<?php require_once('header.php'); ?>

<div class="container">
	<div class="row">
		<h1>Configurações do Squid</h1>
	</div>
	<hr>
	<form action="../controller/ConfiguracaoController.php" method="POST">
		<div class="row">
			<div class="col-md-3">
				<!-- cache_mem -->
				<label for="hostname">Hostname: </label>
				<input type="text" name="hostname" value="" class="form-control">
			</div>	
		</div>
		<br/>
		<div class="row">
			<div class="col-md-6">
				<h3 style="text-align: center;">Configuração do Cache</h3>	
			</div>
			<div class="col-md-6">
				<h3 style="text-align: center;">Autenticação por Usuário</h3>	
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				<!-- cache_mem -->
				<label for="qtdeMemRAM">Quantidade de memória RAM: </label>
				<input type="number" name="qtdeMemRAM" value="" class="form-control">
			</div>
			<div class="col-md-3">
				<!-- maximum_object_size_in_memory -->
				<label for="qtdeMemRAM">Tamanho máximo dos arquivos (RAM): </label>
				<input type="number" name="tamMaxArqRAM" value="" class="form-control">
			</div>	
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				<!-- maximum_object_size -->
				<label for="tamMaxArqDisco">Tamanho máximo dos arquivos (Disco): </label>
				<input type="number" name="tamMaxArqDisco" value="" class="form-control">
			</div>
			<br/>
			<div class="col-md-3">
				<!-- minimum_object_size -->
				<label for="tamMinArqDisco">Tamanho mínimo dos arquivos (Disco): </label>
				<input type="number" name="tamMinArqDisco" value="" class="form-control">
			</div>	
			<br/>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				<!-- cache_swap_low -->
				<label for="cacheSwapLow">Perc. Mínimo de Cache de Swap: </label>
				<input type="number" name="cacheSwapLow" value="" class="form-control">
			</div>	
			<div class="col-md-3">
				<!-- cache_swap_high -->
				<label for="cacheSwapHigh">Perc. Máximo de Cache de Swap: </label>
				<input type="number" name="cacheSwapHigh" value="" class="form-control">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-6 submit">
				<input type="submit" name="" value="Salvar" class="btn btn-success">	
			</div>
		</div>
	</form>
</div>

<?php include_once('footer.php'); ?>