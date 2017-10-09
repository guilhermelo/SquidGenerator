<?php 
	require_once('../dao/ConfiguracaoDAO.class.php'); 
	require_once('header.php'); 

	$daoConfiguracao = new ConfiguracaoDAO();

	$conf = $daoConfiguracao->selecionarConfiguracao();
?>


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
				<input type="text" name="hostname" value="<?= $conf->getHostname() ?>" class="form-control">
			</div>	
		</div>
		<br/>
		<div class="row">
			<div class="col-md-6">
				<h3 style="text-align: center;">Configuração do Cache</h3>	
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				<!-- cache_mem -->
				<label for="qtdeMemRAM">Quantidade de memória RAM (MB): </label>
				<input type="number" name="qtdeMemRAM" value="<?= $conf->getQtdeRam() ?>" class="form-control">
			</div>
			<div class="col-md-3">
				<!-- maximum_object_size_in_memory -->
				<label for="qtdeMemRAM">Tamanho máximo dos arquivos (RAM): </label>
				<input type="number" name="tamMaxArqRAM" value="<?= $conf->getTamMaxArqRAM() ?>" class="form-control">
			</div>	
			<div class="col-md-2">
				<label for="tamArquivoCache">Arquivo Cache (MB): </label>
				<input type="number" name="tamArquivoCache" value="<?= $conf->getTamArquivoCache() ?>" class="form-control">
			</div>	
			<div class="col-md-2">
				<label for="qtdePastas">Qtde de Pastas: </label>
				<input type="number" name="qtdePastas" value="<?= $conf->getQtdePastas() ?>" class="form-control">
			</div>
			<div class="col-md-2">
				<label for="qtdeSubPastas">Qtde de Pastas: </label>
				<input type="number" name="qtdeSubPastas" value="<?= $conf->getQtdeSubPastas() ?>" class="form-control">
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-3">
				<!-- maximum_object_size -->
				<label for="tamMaxArqDisco">Tamanho máximo dos arquivos (Disco): </label>
				<input type="number" name="tamMaxArqDisco" value="<?= $conf->getTamMaxArqDisco() ?>" class="form-control">
			</div>
			<br/>
			<div class="col-md-3">
				<!-- minimum_object_size -->
				<label for="tamMinArqDisco">Tamanho mínimo dos arquivos (Disco): </label>
				<input type="number" name="tamMinArqDisco" value="<?= $conf->getTamMinArqDisco() ?>" class="form-control">
			</div>	
			<div class="col-md-3">
				<!-- cache_swap_low -->
				<label for="cacheSwapLow">Perc. Mínimo de Cache de Swap: </label>
				<input type="number" name="cacheSwapLow" value="<?= $conf->getPercMinCacheSwap() ?>" class="form-control">
			</div>	
			<div class="col-md-3">
				<!-- cache_swap_high -->
				<label for="cacheSwapHigh">Perc. Máximo de Cache de Swap: </label>
				<input type="number" name="cacheSwapHigh" value="<?= $conf->getPercMaxCacheSwap() ?>" class="form-control">
			</div>
			<br/>
		</div>
		<br/>
		<br/>
		<div class="row">
			<div class="col-md-12 submit">
				<input type="submit" name="" value="Salvar" class="btn btn-success">	
			</div>
		</div>
	</form>
</div>

<?php include_once('footer.php'); ?>