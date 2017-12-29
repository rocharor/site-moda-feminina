/* ========
	INSERT
===========*/
//Abrir modal de criar galeria
/*$('.act-abrir-novo').click(function(e){
	e.preventDefault();
	
	$('.form-control').val('');
	$('#modal_nova_galeria').modal();
})

//Carrega miniatura create
$("#imagem_c").change(function(e){
	e.preventDefault();
	
	carregarMiniatura(this,'modelo_nova');
    $('.img-nova').removeClass('hide');
});
*/
/* ========
	UPDATE
===========*/
//Abre e popula o modal editar
/*$('.act-abrir-editar').click(function(e){
	e.preventDefault();	
	
	$('.img-editar1').removeClass('hide');
	$('.img-editar2').addClass('hide');
	$('input[name=imagemE').val('');
	
	var id = $(this).attr('data-id');
	var tr = $(this).parent().parent().find('td');

	var titulo = tr[0].textContent;
	var categoria = tr[1].textContent;
	var descricao = tr[2].textContent;
	var imagem = $(this).attr('data-nome-foto');

	$('input[name=tituloE').val(titulo);
	$('input[name=categoriaE').val(categoria);
	$('textarea[name=descricaoE').val(descricao);
	$('.modelo_editar1').attr('src',url+'/images/galeria/'+imagem);
	$('input[name=id').val(id);
	$('input[name=foto_antiga').val(imagem);
	
	$('#modal_editar_galeria').modal();
});*/

//Carrega miniatura update
/*$("#imagemE").change(function(e){
	e.preventDefault();
	
	carregarMiniatura(this,'modelo_editar2');
	$('.img-editar1').addClass('hide');
	$('.img-editar2').removeClass('hide');
});*/

/* ========
	DELETE
===========*/
/*$('.act-excluir-galeria').click(function(e){
	e.preventDefault();
	
	var id = $(this).attr('data-id');
	
	$.post(
		url+"/admin/galeria/delete", 
		{id: id},
	function(retorno){			
		window.open(url+'/admin/galeria/1/'+retorno,'_self');
    });
	
});*/

/* ========
	GERAL
===========*/

//Alerta de mensagens
setTimeout(function() {
	$('.alerta-msg').fadeOut('slow');
}, 3000);

$('#gerarRelatorio').click(function(e){
	e.preventDefault();
	
	url = '/admin/newsletter/relatorio';
	
	window.open(url);
});