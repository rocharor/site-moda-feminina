/* ========
	INSERT
===========*/
//Abrir modal de criar galeria
$('.act-abrir-novo').click(function(e){
	e.preventDefault();

	$('.form-control').val('');
	$('#modal_novo_representante').modal();
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

	var nome = tr[0].textContent;
	var cidade= tr[1].textContent;

	$('input[name=nomeE').val(nome);
	$('input[name=cidadeE').val(cidade);
	$('input[name=id').val(id);

	$('#modal_editar_representante').modal();
});


/* ========
	DELETE
===========*/
$('.act-excluir-representante').click(function(e){
	e.preventDefault();

	if(confirm('Deseja realmente excluir este item?')){
		var id = $(this).attr('data-id');
		var nome_foto = $(this).attr('data-nome-foto');

		$.post(
			"/admin/representante/delete",
			{id: id,
			 nome_foto:nome_foto},
		function(retorno){
			window.open('/admin/representante/1/'+retorno,'_self');
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
