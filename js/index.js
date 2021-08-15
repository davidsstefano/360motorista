$(document).ready(function () {
    
        fncBuscarmotorista();

        $('#login').submit(function (e) {
            e.preventDefault();
            fnclogar();

            return (false);
        });

    });
    function fncBuscarmotorista() {
   
        var id_servico = $('#formIdServico').val();
        var dataform = $('#formData').val();
    
    
        $('#divAgendamentos').html('<div class="spinner-border text-primary" role="status">\
            <span class="sr-only">Loading...</span>\
        </div>');
        $.getJSON("../api/retorna-agendamentos.php",
            {
               
               
               'id_servico': id_servico,
               'date': dataform,
    
    
            },
            function (data, textStatus, jqXHR) {
                if (data.agendamentos && data.agendamentos.length > 0 && textStatus != "error") {
                    var lista = "";
                    $('#divAgendamentos').text('carreguei legal');
                    data.agendamentos.forEach(element => {
                        lista = lista + '<table class="table table-striped"><tr><td>' + element. nome + '<br>'  + element. email + '<br>' + element. telefone + 
                        '</td><td><br><strong>' + element.servico + '<br>' + element.agendamento_hr + ' / ' + element.agendamento_data + '</strong></td></tr></table>';
                    });
                    
                
                    $('#divAgendamentos').html(lista);
                } else {
                    $('#divAgendamentos').text('Faltam parametros!');
                }
    
    
    
            }
    
        );
    }

    function fnclogar() {



        $.post("../api/api_login.php", $('#login').serialize(),
            function (data, textStatus, jqXHR) {
                console.log(data.controle);
                if (data.controle == 1) {
                    window.location.href = '../public/pag_usuario.php';
                } else if (data.controle == 2) {
                    window.location.href = '../public/pag_motorista.php';

                } else {
                    alert("Email ou senha incorreta!");

                }
            }, "json"
        );
    }
