/**
 * Mostra miniatura de foto
 * @param input = Input file que foi selecionado
 * @param modelo = IMG onde sera colocado a imagem
 */
function carregarMiniatura(input,modelo) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.'+modelo).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

//Imagem carregando
$('.btn_salvar').click(function(){
	$('.img-carregando').removeClass('hide');
});

var validaEmail = function(email){
	var regraRegex = /^([A-z0-9\_\.\-]+)@([A-z0-9]+)(\.[A-z]+)+$/;

	if( !regraRegex.test(email) ){
		return false;
	}

	return true;

}


var alertaPagina = function(texto,classe){

	if(texto == 'undefined' || classe == 'undefined'){
		return false;
	}

	switch (classe) {
	case 'success':
		icone = 'glyphicon-warning-sign'
		break;
	case 'error':
		icone = 'glyphicon-warning-sign'
		break;
	case 'warning':
		icone = 'glyphicon-warning-sign'
		break;
	default:
		icone = '';
		break;
	}

	$.notify({
        icon: "glyphicon " + icone,
        message: texto,
    }, {
        element: 'body',
        type: classe,
        allow_dismiss: true,
        placement: {
            from: "top",
            align: "center"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 4000,
        timer: 1000,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });
}

var alertaComponente = function(texto,classe,posicao){

	if(texto == 'undefined' || classe == 'undefined'){
		return false;
	}

	if(posicao == 'undefined'){
		posicao = 'top';
	}

	$("#email_newsletter").notify(
			texto,
            {
                clickToHide: true,
                autoHide: true,
                autoHideDelay: 5000,
                arrowShow: true,
                arrowSize: 5,
                position: posicao,            
                style: 'bootstrap',
                className: classe,
                showAnimation: 'slideDown',
                showDuration: 400,
                hideAnimation: 'slideUp',
                hideDuration: 200,
                gap: 2}
    );
}





/**
 * Subir para o topo
 */
$(window).scroll(function() {
	if ($(this).scrollTop() > 292) {
		$('#botaoVoltarTopo').show();

	}else{
		$('#botaoVoltarTopo').hide();
	}
});

$('.botao-voltar-topo').click(function(){
	$("html, body").animate({scrollTop: 0 }, 600);
	return false;
});

/*
HTML
<div class="botao-voltar-topo" id="botaoVoltarTopo">
	<i></i><span>Topo</span>
</div>
 */

/*
div.botao-voltar-topo{
	z-index: 9999;
	display: none;
	position: fixed;
	bottom: 10px;
	right:10px;
	background-color: #0085B1;
	-webkit-box-shadow:  0px 0px 10px 0px #ffffff;
	box-shadow:  0px 0px 10px 0px #ffffff;
	padding: 1px;
	width: 60px;
	height: 40px;
	line-height: 40px;
	cursor: pointer;
	opacity:0.5;
	filter:alpha(opacity=50)

}
div.botao-voltar-topo:hover{
	opacity:1;
	filter:alpha(opacity=100)
}

div.botao-voltar-topo i{
	display: block;
	height: 20px;
	width: 20px;
	background:url(/imagens/botoes.png);
	background-position:-52px 0px;
	float: left;
	margin-top: 10px;
	margin-right: 3px;
}

div.botao-voltar-topo span{
	display: block;
	float: left;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF
}

 */
