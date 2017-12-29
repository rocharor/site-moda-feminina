$(document).ready(function () {

	/**
	 * NEWSLETTER
	 */
	$('.act-newsletter').click(function(e){
		e.preventDefault();

		//var imported = document.createElement('script');
		//imported.src = 'libs/notify/notify.js';
		//document.head.appendChild(imported);

		//$.getScript("libs/notify/notify.js", function(){
		//   alert("Script loaded but not necessarily executed.");
		//});

		var email = $('#email_newsletter').val();

		if(validaEmail(email)){
			$.post(
				'/newsletter',
				{email: email},
				function(retorno){
					if(retorno == 1){
						alertaComponente('E-mail salvo com sucesso','success','top');
						$('#email_newsletter').val('');
					}else{
						alertaComponente('Ops houve algum erro. Tente novamente.','error','top');
					}
				}
			);
		}else{
			alertaComponente('E-mail Inválido','error','top');
		}
	});

	/**
	 * Data copyright
	 */
	var currentYear = (new Date).getFullYear();
    $("#copyright-year").text(currentYear);


    var o = $('html');
    if (o.hasClass('desktop')) {
        $('#stuck_container').TMStickUp({})
    }

    $('.filtro-estado').change(function(e){
		e.preventDefault();
		var campo = $(this).val();
		alert(campo);
	});
});
