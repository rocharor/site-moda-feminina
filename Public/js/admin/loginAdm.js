/*
 Login 
*/
$(".user").focusin(function(){
	$(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function(){
	$(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function(){
	$(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function(){
	$(".inputPassIcon").css("color", "white");
});
	

/*
Logout 
*/
$('.act-deslogar').click(function(){
	$.post(
			"/admin/deslogar",				
		function(retorno){	
			alert('deslogado com sucesso');
			window.open('/','_self');
	    }
	);
});	