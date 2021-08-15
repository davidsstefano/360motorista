$(document).ready(function () {

    $('.txt-disabled').prop('disabled', true); //desabilitar os campos de inicio
    //funcao ao selecionar a motorista
    $('#motorista').change(function () {
        $('#chat').prop('disabled', false).focus();
        fncCarregaConversa();
    });


    $('#enviar').submit(function (e) {
        e.preventDefault();
        fncMensagem();

        return (false);

    });
});

function fncCarregaConversa() {

    //capturar os valores selecionados para passar pra api
    let idUsuario = $('#id_usuario').val();
    let idMotorista = $('#id_motorista').val();


   

    if (idUsuario > 0 && idMotorista > 0 && data.length > 0) {
       

        $.post(
            '"../api/ver.php"',
            {
                'id_usuario': idUsuario,
                'id_motorista': idMotorista,
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

    }
}