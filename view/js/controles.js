var porHora = document.getElementById('porHora');
var porAutenticacao = document.getElementById('porAutenticacao');
var porExtensao = document.getElementById('porExtensao');

porHora.addEventListener('click', function() {
	document.getElementById('hrInicio').disabled = false;
	document.getElementById('hrFim').disabled = false;
});

porAutenticacao.addEventListener('click', function(){
	document.getElementById('usuario').disabled = false;
	document.getElementById('senha').disabled = false;
});

porExtensao.addEventListener('click', function(){
	document.getElementById('extExe').disabled = false;
	document.getElementById('extPNG').disabled = false;
	document.getElementById('extPDF').disabled = false;
	document.getElementById('extGIF').disabled = false;
});





