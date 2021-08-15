$(document).ready(function () {
	$('#inichat').submit(function (e) {
		e.preventDefault();
		fncchat();

		return (false);
	});


	fncCarregaConversa();

	$('#msg').submit(function (e) {
		e.preventDefault();
		fncMensagem();

		return (false);
	});

});

function fncchat() {



	$.POST("../api/carrega_chat.php", $('#inichat').serialize(),
		function (data, textStatus, jqXHR) {
			console.log(data.controle);
			if (data.controle > 0) {

				window.location.href = '../public/pag_chat.php';


			} else {
				alert("Erro");

			}
		}, "json"
	);
}

function fncMensagem() {


	$.ajax({
		method: "POST",
		url: "../api/api_chat.php",
		data: $('#msg').serialize(),


		success: function (data) {
			console.log(data);
			if (data.erro == 0) {
				alert(data.msg);
			} else if (data.erro == 1) {
				alert(data.msg);
			}
		}
	});

}

function fncCarregaConversa() {

	 var id_usuario = $('#formUsuario').val();
	var id_motorista = $('#formMotorista').val();


	$('#divConversa').html('<div">\
        <span class="sr-only">Loading...</span>\
    </div>');


	$.getJSON("../api/ver.php",
		{
			'id_usuario': id_usuario,
			'id_motorista': id_motorista,

		},

		function (data, textStatus, jqXHR) {
			if (data.conversa && data.conversa.length > 0 && textStatus != "error") {

				var lista = "";
				$('#divConversa').text('carreguei legal');

				data.conversa.forEach(element => {
					lista = lista + '<table> <tr>' + element.motorista + '<br>' + element.texto + + element.hora + '<br>'
					'</tr></table>';


				});


				$('#divConversa').html(lista);
			} else {
				$('#divConversa').text('Faltam parametros!');
			}



		}

	);
}




