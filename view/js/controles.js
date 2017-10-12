var porHora = document.getElementById('porHora');
var porAutenticacao = document.getElementById('porAutenticacao');
var porExtensao = document.getElementById('porExtensao');


if(porHora.checked){
	document.getElementById('hrInicio').disabled = false;
	document.getElementById('hrFim').disabled = false;	
}

if(porAutenticacao.checked){
	document.getElementById('usuario').disabled = false;
	document.getElementById('senha').disabled = false;
}

if(porExtensao.checked){
	document.getElementById('extExe').disabled = false;
	document.getElementById('extPNG').disabled = false;
	document.getElementById('extPDF').disabled = false;
	document.getElementById('extGIF').disabled = false;		
}


porHora.addEventListener('click', function() {
	if(porHora.checked){
		document.getElementById('hrInicio').disabled = false;
		document.getElementById('hrFim').disabled = false;	
	}else{
		document.getElementById('hrInicio').disabled = true;
		document.getElementById('hrFim').disabled = true;	
	}
});

porAutenticacao.addEventListener('click', function(){
	if(porAutenticacao.checked){
		document.getElementById('usuario').disabled = false;
		document.getElementById('senha').disabled = false;
	} else{
		document.getElementById('usuario').disabled = true;
		document.getElementById('senha').disabled = true;
	}
});

porExtensao.addEventListener('click', function(){
	if(porExtensao.checked){
		document.getElementById('extExe').disabled = false;
		document.getElementById('extPNG').disabled = false;
		document.getElementById('extPDF').disabled = false;
		document.getElementById('extGIF').disabled = false;
	}else{
		document.getElementById('extExe').disabled = true;
	document.getElementById('extPNG').disabled = true;
	document.getElementById('extPDF').disabled = true;
	document.getElementById('extGIF').disabled = true;
	}
});





