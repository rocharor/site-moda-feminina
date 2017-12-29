/* ========
	INSERT
===========*/
//Abrir modal de criar galeria
$('.act-abrir-novo').click(function(e){
	e.preventDefault();

	$('.form-control').val('');
	$('.texto_tamanho').html('Tamanho máximo permitido 3M.');
	$('.texto_tamanho').addClass('text-danger').removeClass('alert alert-danger');


	$('#modal_nova_galeria').modal();
})

//Carrega miniatura create
$("#imagem_c").change(function(e){
	e.preventDefault();

	var tamanho_foto = this.files[0].size;
	if(tamanho_foto > 3000000){
		$(this).val('');
		$('.texto_tamanho').html('Imagem passa do tamanho permitido de 3M.');
		$('.texto_tamanho').addClass('alert alert-danger')
		$('.img-nova').addClass('hide');
		return false;
	}else{
		$('.texto_tamanho').html('');
	}

	carregarMiniatura(this,'modelo_nova');
    $('.img-nova').removeClass('hide');
});

/* ========
	UPDATE
===========*/
//Abre e popula o modal editar
$('.act-abrir-editar').click(function(e){
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
	$('.modelo_editar1').attr('src', '/images/galeria/'+imagem);
	$('input[name=id').val(id);
	$('input[name=foto_antiga').val(imagem);

	$('#modal_editar_galeria').modal();
});

//Carrega miniatura update
$("#imagemE").change(function(e){
	e.preventDefault();

	var tamanho_foto = this.files[0].size;
	if(tamanho_foto > 3000000){
		$(this).val('');
		$('.texto_tamanho').html('Imagem passa do tamanho permitido de 3M.');
		$('.texto_tamanho').addClass('alert alert-danger')
		$('.img-nova').addClass('hide');
		return false;
	}else{
		$('.texto_tamanho').html('Tamanho máximo permitido 3M.');
		$('.texto_tamanho').addClass('text-danger');
	}

	carregarMiniatura(this,'modelo_editar2');
	$('.img-editar1').addClass('hide');
	$('.img-editar2').removeClass('hide');
});

/* ========
	DELETE
===========*/
$('.act-excluir-galeria').click(function(e){
	e.preventDefault();

	if(confirm('Deseja realmente excluir este item?')){
		var id = $(this).attr('data-id');
		var nome_foto = $(this).attr('data-nome-foto');

		$.post(
			"/admin/galeria/delete",
			{id: id,
			 nome_foto:nome_foto},
		function(retorno){
			window.open('/admin/galeria/1/'+retorno,'_self');
	    });
	}

});

/* ========
	GERAL
===========*/

//Alerta de mensagens
setTimeout(function() {
	$('.alerta-msg').fadeOut('slow');
}, 3000);
